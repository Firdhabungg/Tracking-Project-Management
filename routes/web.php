<?php

use App\Livewire\Dashboard;
use App\Livewire\ProjectCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);
Route::get('/project/create', ProjectCreate::class);
