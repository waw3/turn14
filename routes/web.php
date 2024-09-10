<?php

use Illuminate\Support\Facades\Route;
use App\Services\Turn14Service;

Route::get('/', function () {

    $service = new Turn14Service();


    // $brands = $service->getBrands();

    $items = $service->getItems(1);

    dd($items[0]);

    // return view('welcome');
});




