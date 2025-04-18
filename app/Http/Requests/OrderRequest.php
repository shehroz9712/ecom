<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'services' => 'array',
            'services.*.id' => 'integer',
            'services.*.price' => 'numeric',
            'services.*.media_id' => 'nullable|integer|exists:media,id',
            'services.*.is_revision' => 'integer|in:0,1',

            // Validate other fields
            'cart_id' => 'required|integer|exists:carts,id',
            'currency' => 'required|string',
            'invoice_number' => 'sometimes|required|string|max:10|unique:orders,invoice_number',
            'discount_amount' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'tax_amount' => 'required|numeric',
            'tax_type' => 'required|string',
            'total_amount' => 'required|numeric',
            'description' => 'required|string|min:3',
            'user_id' => 'nullable|integer|exists:users,id',
            'payment_type' => 'required|string|in:paypal,payoneer,google pay,coins,stripe,free_premium',
            'coupon_code' => 'nullable|string',
            'coupon_discount_percent' => 'nullable|numeric',
            'used_coins' => 'nullable|integer',

            // Card details
            'card_number' => 'nullable|string|max:20',
            'card_name' => 'nullable|string',
            'decline_issue' => 'nullable|string',
            'card_holder_email' => 'nullable|string|email',
            'address' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'status' => 'required|in:active,inactive',

        ];
    }
}
