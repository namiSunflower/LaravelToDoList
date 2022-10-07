<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetCollection;
use App\Http\Resources\PetResource;
use App\Models\Pet;


class TestController extends Controller
{
    //
    public function json()
    { 
        return new PetCollection(Pet::all());
    }

    public function index()
    {
        return view('admin.api.example');
    }

}
