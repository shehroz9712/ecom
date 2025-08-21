<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    public function run(): void
    {

        Page::insert([
            [
                'title'                 => 'About Us',
                'slug'                  => 'about-us',
                'heading'               => 'Turning Job Applications into Opportunities',
                'page_image'            => NULL,
                'short_description'     => 'AI Pro Resume is an all-in-one platform offering everything a job hunter needs. From easy resume format to expert tips, we have all that assist you in landing your dream interview.',
                'long_description'      => NULL,
                'meta_keywords'         => 'Resume,Job, AI, Machine Learning',
                'meta_description'      => 'Ai Pro Resume',
                'status'                => 'active',
                'created_by'            => 1,
                'sort'                  => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'             => 'Privacy Policy',
                'slug'              => 'privacy-policy',
                'heading'           => 'Privacy Policy',
                'page_image'        => NULL,
                'short_description' => 'How we collect, use, and protect your information at Orcheee.com.',
                'long_description'  => '<h1>Privacy Policy</h1>
<p>Welcome to Orcheee.com. Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your personal information when you visit or make a purchase from our website.</p>

<h2>1. Information We Collect</h2>
<p>We may collect the following types of personal information:</p>
<ul>
<li>Name, phone number, email address</li>
<li>Shipping & billing addresses</li>
<li>Payment information (processed securely via third-party payment gateways)</li>
<li>Browsing behaviour and device information (via cookies & analytics tools)</li>
</ul>

<h2>2. How We Use Your Information</h2>
<ul>
<li>Process and deliver your orders</li>
<li>Communicate with you about your order status or support queries</li>
<li>Send promotional emails or offers (only if you opt-in)</li>
<li>Improve our website and services</li>
<li>Prevent fraud and ensure security</li>
</ul>

<h2>3. Sharing of Information</h2>
<p>We do not sell your personal information. However, we may share it with trusted third-party partners for:</p>
<ul>
<li>Payment processing</li>
<li>Shipping and delivery</li>
<li>Website analytics (e.g., Google Analytics)</li>
<li>Marketing (if you have given consent)</li>
</ul>
<p>All third-party services are bound by their own privacy policies and comply with industry-standard data protection.</p>

<h2>4. Cookies</h2>
<p>We use cookies and similar tracking technologies to:</p>
<ul>
<li>Remember your preferences</li>
<li>Analyze website traffic and usage</li>
<li>Show personalised ads (via third-party advertising networks)</li>
</ul>
<p>You can manage or disable cookies anytime via your browser settings.</p>

<h2>5. Data Security</h2>
<p>We implement secure protocols and encryption to protect your data. However, no online transmission is 100% secure. By using our site, you acknowledge this risk and agree to our terms.</p>

<h2>6. Your Rights</h2>
<ul>
<li>Access the data we have about you</li>
<li>Request corrections or deletions</li>
<li>Opt-out of marketing emails</li>
<li>Withdraw consent at any time</li>
</ul>
<p>To make any such request, email us at: <a href="mailto:support@orcheee.com">support@orcheee.com</a></p>

<h2>7. Children’s Privacy</h2>
<p>Our website is not intended for children under 13. We do not knowingly collect data from minors. If you believe we have, please contact us immediately.</p>

<h2>8. Changes to This Policy</h2>
<p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date.</p>

<h2>9. Contact Us</h2>
<p>Email: <a href="mailto:support@orcheee.com">support@orcheee.com</a></p>
<p>Website: <a href="https://www.orcheee.com">www.orcheee.com</a></p>',
                'meta_keywords'     => 'Privacy, Policy, Orcheee',
                'meta_description'  => 'Privacy Policy of Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 6,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => 'Return & Refund Policy',
                'slug'              => 'return-refund-policy',
                'heading'           => 'Return & Refund Policy',
                'page_image'        => NULL,
                'short_description' => 'Our return and refund policy at Orcheee.com — how returns, exchanges, and refunds work.',
                'long_description'  => '<h1>Return & Refund Policy</h1>
<p>At Orcheee.com, customer satisfaction is our top priority. If you are not completely satisfied with your purchase, we’re here to help.</p>

<h2>1. Return Eligibility</h2>
<p>You can request a return if:</p>
<ul>
<li>You received the wrong item</li>
<li>The product is damaged or defective</li>
<li>The item delivered is incomplete</li>
</ul>

<h2>2. Return Conditions</h2>
<p>To be eligible for a return:</p>
<ul>
<li>You must contact us within 48 hours of delivery</li>
<li>The item must be unused, in its original packaging</li>
<li>Proof of purchase (order ID or invoice) must be provided</li>
<li>You may be asked to share product pictures/videos for verification</li>
</ul>

<h2>3. Non-Returnable Items</h2>
<ul>
<li>Items damaged due to misuse or mishandling</li>
<li>Clearance sale or discounted products (unless faulty)</li>
<li>Hygiene-related items (e.g. cleaning cloths, brushes) unless sealed and unopened</li>
</ul>

<h2>4. Return Process</h2>
<p>To request a return:</p>
<ul>
<li>Email us at <a href="mailto:support@orcheee.com">support@orcheee.com</a> within 48 hours</li>
<li>Include your Order ID and reason for return</li>
<li>Our team will review your request and guide you through the return procedure</li>
<li>Approved returns will be picked up or sent to our return address</li>
</ul>

<h2>5. Refund Policy</h2>
<p>Once your return is received and inspected:</p>
<ul>
<li>If approved, a refund will be issued within 5–7 business days</li>
<li>Refunds are processed via your original payment method or as store credit, based on your choice</li>
<li>Shipping charges (if any) are non-refundable unless the return is due to our error</li>
</ul>

<h2>6. Exchanges</h2>
<p>We offer product exchange only for wrong, damaged, or defective items (subject to stock availability).</p>

<h2>7. Contact Us</h2>
<p>For return or refund-related queries, please contact:</p>
<p>📧 Email: <a href="mailto:support@orcheee.com">support@orcheee.com</a><br>
🌐 Website: <a href="https://www.orcheee.com">www.orcheee.com</a></p>',
                'meta_keywords'     => 'Return, Refund, Exchange, Orcheee',
                'meta_description'  => 'Return and Refund Policy of Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 7,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],

            [
                'title'             => 'Terms & Conditions',
                'slug'              => 'terms-and-conditions',
                'heading'           => 'Terms & Conditions',
                'page_image'        => NULL,
                'short_description' => 'The terms and conditions for using Orcheee.com and its services.',
                'long_description'  => '<h1>Terms & Conditions</h1>
<p>Welcome to Orcheee.com. By using our website, you agree to the terms below. Please read them carefully.</p>

<h2>1. General</h2>
<p>Orcheee.com is an online store offering affordable household products in Pakistan.</p>
<p>By shopping with us, you accept these Terms & our Privacy Policy.</p>

<h2>2. Pricing & Payments</h2>
<ul>
<li>All prices are in Pakistani Rupees (PKR).</li>
<li>We accept secure online payments via trusted payment gateways.</li>
<li>Prices may change without prior notice.</li>
</ul>

<h2>3. Orders & Delivery</h2>
<ul>
<li>Orders are confirmed via SMS/email.</li>
<li>Delivery times vary by location but usually take 2–5 working days.</li>
<li>Shipping charges (if any) will be shown at checkout.</li>
</ul>

<h2>4. Returns & Refunds</h2>
<ul>
<li>We accept returns only if the item is damaged, defective, or incorrect.</li>
<li>You must notify us within 48 hours of delivery.</li>
<li>Refunds are processed to the original payment method or as store credit.</li>
</ul>

<h2>5. User Responsibilities</h2>
<ul>
<li>You must provide accurate information when placing an order.</li>
<li>Misuse of our platform (fake orders, abusive behavior, etc.) is not allowed.</li>
</ul>

<h2>6. Intellectual Property</h2>
<p>All content on Orcheee.com (logos, images, product info) belongs to us. Please don’t copy or reuse without permission.</p>

<h2>7. Legal</h2>
<p>These terms are governed by the laws of Pakistan.</p>
<p>Any disputes will be handled under the jurisdiction of Pakistani courts.</p>

<h2>8. Contact Us</h2>
<p>📧 Email: <a href="mailto:support@orcheee.com">support@orcheee.com</a></p>
<p>🌐 Website: <a href="https://www.orcheee.com">www.orcheee.com</a></p>',
                'meta_keywords'     => 'Terms, Conditions, Orcheee',
                'meta_description'  => 'Terms and Conditions of Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 7,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => 'Home',
                'slug'              => 'home',
                'heading'           => 'Home',
                'page_image'        => NULL,
                'short_description' => 'Welcome to our store.',
                'long_description'  => '<h1>Home</h1><p>Homepage content here...</p>',
                'meta_keywords'     => 'Home, Orcheee',
                'meta_description'  => 'Homepage of Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 8,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => 'Brand Shop',
                'slug'              => 'brand-shop',
                'heading'           => 'Brand Shop',
                'page_image'        => NULL,
                'short_description' => 'Explore all our brands.',
                'long_description'  => '<h1>Brand Shop</h1><p>Brand shop details here...</p>',
                'meta_keywords'     => 'Brand, Shop, Orcheee',
                'meta_description'  => 'Brand Shop of Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 9,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => 'Promotion',
                'slug'              => 'promotion',
                'heading'           => 'Promotion',
                'page_image'        => NULL,
                'short_description' => 'Latest deals and special offers.',
                'long_description'  => '<h1>Promotion</h1><p>Promotion details here...</p>',
                'meta_keywords'     => 'Promotion, Deals, Orcheee',
                'meta_description'  => 'Promotions at Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 10,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => 'New Arrival',
                'slug'              => 'new-arrival',
                'heading'           => 'New Arrival',
                'page_image'        => NULL,
                'short_description' => 'Check out the newest products in our store.',
                'long_description'  => '<h1>New Arrival</h1><p>New arrivals content here...</p>',
                'meta_keywords'     => 'New, Arrival, Products',
                'meta_description'  => 'New Arrivals at Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 11,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => '500 server error',
                'slug'              => '500',
                'heading'           => '500 server error',
                'page_image'        => '500.png',
                'short_description' => 'Check out the newest products in our store.',
                'long_description'  => '<h1>500 server error</h1><p>500 server errors content here...</p>',
                'meta_keywords'     => 'New, Arrival, Products',
                'meta_description'  => '500 server errors at Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 11,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => '404 Not found',
                'slug'              => '404',
                'heading'           => '404 Not found',
                'page_image'        => '404.png',
                'short_description' => 'Check out the newest products in our store.',
                'long_description'  => '<h1>404 Not found</h1><p>404 Not founds content here...</p>',
                'meta_keywords'     => 'New, Arrival, Products',
                'meta_description'  => '404 Not founds at Orcheee.com',
                'status'            => 'active',
                'created_by'        => 1,
                'sort'              => 11,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ]);
    }
}
