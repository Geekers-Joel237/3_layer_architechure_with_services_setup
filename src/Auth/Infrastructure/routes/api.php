<?php

use App\Auth\Presentation\Http\Controllers\LoginAction;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginAction::class);
