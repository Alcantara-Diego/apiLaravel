<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BuscarController;
use App\Http\Controllers\CriarController;
use App\http\Middleware\Cors;



Route::group(["middleware" => Cors::class], function (){
    Route::get("/buscar/", [BuscarController::class, "index"]);

    Route::get("/buscar/id/{id}", [BuscarController::class, "showById"]);

    Route::get("/buscar/tipo/{tipo}", [BuscarController::class, "showByTipo"]);

    Route::get("/buscar/curso/{curso}", [BuscarController::class, "showByCurso"]);

    Route::post("/criar", [CriarController::class,"store"]);

});
