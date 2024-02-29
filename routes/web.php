<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Admin\ComicController;

Route::resource('comics', ComicController::class);
