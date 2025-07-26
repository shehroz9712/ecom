<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;

class MergeGuestCart
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $deviceId = request()->cookie('device_id');

        if (!$deviceId) return;

        // Fetch guest cart items
        $guestCartItems = Cart::where('device_id', $deviceId)
            ->whereNull('user_id')
            ->where('status', 'active')
            ->get();

        foreach ($guestCartItems as $guestItem) {
            // Check if user already has same item
            $existingItem = Cart::where('product_id', $guestItem->product_id)
                ->where('user_id', $user->id)
                ->where('variant_id', $guestItem->variant_id)
                ->where('status', 'active')
                ->first();

            if ($existingItem) {
                // Merge qty
                $existingItem->qty += $guestItem->qty;
                $existingItem->save();

                // Delete guest item
                $guestItem->delete();
            } else {
                // Assign user_id to guest item
                $guestItem->user_id = $user->id;
                $guestItem->created_by = $user->id;
                $guestItem->save();
            }
        }
    }
}
