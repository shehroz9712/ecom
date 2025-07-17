<?php


use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Entity list
$entities = [
    'admins'                    => 'Admin',
    'users'                     => 'User',
    'products'                  => 'Product',
    'product_images'            => 'Product Image',
    'product_variants'          => 'Variant',
    'product_variant_attributes' => 'Variant Attribute',
    'categories'                => 'Category',
    'sub_categories'            => 'Sub Category',
    'sub_category_items'        => 'Sub Category Item',
    'orders'                    => 'Order',
    'reviews'                   => 'Review',
    'review_images'             => 'Review Image',
    'testimonials'              => 'Testimonial',
    'vendors'                   => 'Vendor',
    'wishlists'                 => 'Wishlist',
    'blogs'                     => 'Blog',
    'pages'                     => 'Page',
    'sliders'                   => 'Slider',
    'payment_methods'           => 'Payment Method',
    'countries'                 => 'Country',
    'states'                    => 'State',
    'cities'                    => 'City',
    'addresses'                 => 'Address',
    'settings'                  => 'Setting',
];

// Generate breadcrumbs for all
foreach ($entities as $routeKey => $title) {

    // Index
    Breadcrumbs::for("admin.{$routeKey}.index", function (BreadcrumbTrail $trail) use ($routeKey, $title) {
        $trail->parent('admin.dashboard');
        $trail->push("{$title}s List", route("admin.{$routeKey}.index"));
    });

    // Create
    Breadcrumbs::for("admin.{$routeKey}.create", function (BreadcrumbTrail $trail) use ($routeKey, $title) {
        $trail->parent("admin.{$routeKey}.index");
        $trail->push("Add {$title}", route("admin.{$routeKey}.create"));
    });

    // Show
    Breadcrumbs::for("admin.{$routeKey}.show", function (BreadcrumbTrail $trail, $data) use ($routeKey, $title) {
        $trail->parent("admin.{$routeKey}.index");
        $trail->push($data->name ?? $data->title ?? "Show {$title}", route("admin.{$routeKey}.show", $data->id));
    });

    // Edit
    Breadcrumbs::for("admin.{$routeKey}.edit", function (BreadcrumbTrail $trail, $data) use ($routeKey, $title) {
        $trail->parent("admin.{$routeKey}.index");
        $trail->push('Edit', route("admin.{$routeKey}.edit", $data->id));
    });
}
