<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class BookingController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $request->validate([
            'quantity' => "required|integer|min:1|max:{$event->remainingSeats()}",
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'quantity' => $request->quantity,
            'payment_status' => $event->price > 0 ? 'unpaid' : 'free',
        ]);

        // Generate QR
        $qrData = route('bookings.checkin', $booking->id);
        $qrCode = QrCode::format('png')->size(200)->generate($qrData);
        $qrPath = 'qr/' . uniqid() . '.png';
        Storage::put('public/' . $qrPath, $qrCode);
        $booking->update(['qr_code_path' => $qrPath]);
        $booking->load('user');
        // Generate PDF
        $pdf = Pdf::loadView('bookings.pdf', compact('booking', 'event'));
        return $pdf->download('booking-confirmation.pdf');
    }
    public  function myBookings()
    {
        $user = Auth::user();
        $bookings = Booking::with('event')->where('user_id', $user->id)->get();
        return view('user.my-bookings', compact('bookings'));
    }
    public function adminIndex()
    {
        $bookings = Booking::with('user', 'event')->latest()->get();

        return view('admin.bookings.index', compact('bookings'));
    }
    public function downloadTicket($bookingId)
{
    $booking = Booking::with('event')->where('id', $bookingId)
        ->where('user_id', Auth::id()) // prevent downloading others' tickets
        ->firstOrFail();

    $pdf = Pdf::loadView('pdf.ticket', compact('booking'));

    return $pdf->download('ticket_' . $booking->id . '.pdf');
}
}
