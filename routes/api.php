<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BuscarController;
use App\Http\Controllers\CriarController;



Route::get("/buscar/", [BuscarController::class, "index"]);

Route::get("/buscar/{id}", [BuscarController::class, "show"]);

Route::post("/criar", [CriarController::class,"store"]);