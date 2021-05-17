<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    public function teste(){
        return 'Ola sou um metodo de teste';
    }
}
