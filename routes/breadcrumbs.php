<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Admins
Breadcrumbs::for('admin.admins.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Admins List', route('admin.admins.index'));
});

Breadcrumbs::for('admin.admins.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.admins.index');
    $trail->push('Add', route('admin.admins.create'));
});

Breadcrumbs::for('admin.admins.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.admins.index');
    $trail->push($data->title, route('admin.admins.show', $data->id));
});

Breadcrumbs::for('admin.admins.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.admins.index');
    $trail->push('Edit', route('admin.admins.edit', $data->id));
});
// users
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users List', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users.index');
    $trail->push('Add User', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.users.index');
    $trail->push($data->name, route('admin.users.show', $data->id));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.users.index');
    $trail->push('Edit', route('admin.users.edit', $data->id));
});

// settings
Breadcrumbs::for('admin.settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Settings List', route('admin.settings.index'));
});

Breadcrumbs::for('admin.settings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.settings.index');
    $trail->push('Add Setting', route('admin.settings.create'));
});

Breadcrumbs::for('admin.settings.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.settings.index');
    $trail->push($data->name, route('admin.settings.show', $data->id));
});

Breadcrumbs::for('admin.settings.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.settings.index');
    $trail->push('Edit', route('admin.settings.edit', $data->id));
});


// orders
Breadcrumbs::for('admin.orders.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Orders List', route('admin.orders.index'));
});

Breadcrumbs::for('admin.orders.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.orders.index');
    $trail->push('Add Order', route('admin.orders.create'));
});

Breadcrumbs::for('admin.orders.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.orders.index');
    $trail->push($data->name, route('admin.orders.show', $data->id));
});

Breadcrumbs::for('admin.orders.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.orders.index');
    $trail->push('Edit', route('admin.orders.edit', $data->id));
});



// products
Breadcrumbs::for('admin.products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Products List', route('admin.products.index'));
});

Breadcrumbs::for('admin.products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products.index');
    $trail->push('Add Products', route('admin.products.create'));
});

Breadcrumbs::for('admin.products.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.products.index');
    $trail->push($data->name, route('admin.products.show', $data->id));
});

Breadcrumbs::for('admin.products.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('admin.products.index');
    $trail->push('Edit', route('admin.products.edit', $data->id));
});
