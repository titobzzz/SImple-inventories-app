<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::apiResource('product', ProductController::class);