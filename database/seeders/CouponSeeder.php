<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // If you want to reset coupons on each seed, uncomment the next line (careful in production)
        // DB::table('coupons')->truncate();

        $now = Carbon::now();

        $rows = [
            // ─────────────────────────────────────────────────────────────────────
            // Guest Coupon
            // ─────────────────────────────────────────────────────────────────────
            [
                'title'               => 'Guest Welcome 10% OFF',
                'code'                => 'WELCOME10',             // unique code
                'description'         => 'Welcome discount for guest checkout users.',
                'discount_type'       => 'percentage',            // flat | percentage
                'discount_value'      => 10,                      // 10%
                'start_date'          => $now->toDateString(),
                'end_date'            => $now->copy()->addDays(30)->toDateString(),
                'min_spend'           => 0.00,
                'max_discount_amount' => 2000.00,                 // cap the discount
                'total_usage_limit'   => 10000,                   // site-wide limit
                'total_usage_count'   => 0,
                'is_for_guest'        => 1,                       // <- guest only
                'user_usage_limit'    => 1,                       // per-user limit
                'status'              => 'active',
                'user_id'             => null,                    // not bound to any one user
                'created_by'          => 1,                       // make sure user id 1 exists
                'updated_by'          => 1,
                'created_at'          => $now,
                'updated_at'          => $now,
                'deleted_at'          => null,
            ],

            // ─────────────────────────────────────────────────────────────────────
            // Registered Users Coupon
            // ─────────────────────────────────────────────────────────────────────
            [
                'title'               => 'Summer 25% OFF (Registered)',
                'code'                => 'SUMMER25',
                'description'         => 'Site-wide 25% off for registered users. Min spend 5,000. Max discount 3,000.',
                'discount_type'       => 'percentage',
                'discount_value'      => 25,
                'start_date'          => $now->toDateString(),
                'end_date'            => $now->copy()->addDays(60)->toDateString(),
                'min_spend'           => 5000.00,
                'max_discount_amount' => 3000.00,
                'total_usage_limit'   => 5000,
                'total_usage_count'   => 0,
                'is_for_guest'        => 0,                       // <- registered users
                'user_usage_limit'    => 2,
                'status'              => 'active',
                'user_id'             => null,                    // optional: bind to a user if needed
                'created_by'          => 1,
                'updated_by'          => 1,
                'created_at'          => $now,
                'updated_at'          => $now,
                'deleted_at'          => null,
            ],
        ];

        // If you have a unique index on `code`, upsert is safer than insert:
        DB::table('coupons')->upsert(
            $rows,
            ['code'], // unique key
            [
                'title',
                'description',
                'discount_type',
                'discount_value',
                'start_date',
                'end_date',
                'min_spend',
                'max_discount_amount',
                'total_usage_limit',
                'total_usage_count',
                'is_for_guest',
                'user_usage_limit',
                'status',
                'user_id',
                'created_by',
                'updated_by',
                'updated_at',
                'deleted_at'
            ]
        );
    }
}
