<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    dd('Login');
});

Route::get('/run-migrations', function (Request $request) {
    if ($request->query('key') !== env('MIGRATION_SECRET')) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    Artisan::call('migrate --seed');
    return response()->json(['message' => 'Migration and seeding completed successfully.']);
});
