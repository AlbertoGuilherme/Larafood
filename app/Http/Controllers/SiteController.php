<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;

class SiteController extends Controller
{
    public function index()
    {
        $userName = 0 ;
            if(auth()->user())
                $userName = auth()->user()->name;

           $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

                return view('site.home.pages.planos', ['plans' => $plans, 'userName' => $userName]);
    }

    public function plan($url)
    {
        if(!$plan = Plan::where('url', $url)->first())
        {
            return redirect()->back();
        }

        session()->put('plan', $plan );

        return redirect()->route('register');
    }
}
