<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class SiteController extends Controller
{
    public function index()
    {
                $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

                return view('site.home.pages.planos', ['plans' => $plans]);
    }
}
