<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Event;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // ✅ make sure this is here
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session as LaravelSession; // to avoid naming conflict
use App\Mail\PaymentConfirmation;
use App\Models\Transaction;



class StripeController extends Controller
{
    public function checkout(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $event->title,
                    ],
                    'unit_amount' => (int)$event->price * 100,
                ],
                'quantity' => $request->quantity ?? 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success', ['event' => $event->id]),
            'cancel_url' => url()->previous(),
            'metadata' => [
                'user_id' => Auth::id(),
                'event_id' => $event->id,
                'quantity' => $request->quantity ?? 1,
                
            ]
        ]);

        return redirect($session->url);
    }
    public function success(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $user = Auth::user();
        $amount = $event->price;

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to complete booking.');
        }

        // Check if booking already exists
        $existing = Booking::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();

        if (!$existing) {
            Booking::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'quantity' => 1,
                'paid' => true,
            ]);

            // ✅ Store transaction correctly
            Transaction::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'amount' => $amount,
                'payment_intent_id' => $request->get('payment_intent') ?? null,
                'status' => 'succeeded',
            ]);
        }

        // ✅ Email
        Mail::to($user->email)->send(new \App\Mail\PaymentConfirmation($event));

        return redirect()->route('home')->with('success', 'Payment successful! Booking confirmed.');
    }
}
