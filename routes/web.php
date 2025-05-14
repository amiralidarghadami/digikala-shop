<?php

use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Country\Index as CountryIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::get('/', DashboardIndex::class)->name('dashboard');
    Route::get('/country', CountryIndex::class)->name('country.index');
});

