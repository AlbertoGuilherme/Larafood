<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeUpdate;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlansController extends Controller
{
        private $repository ;
    public function __construct(Plan $plan)
    {
          $this->repository = $plan;
    }
    public function index()
    {

         $plans  = $this->repository->latest()->paginate(4) ;

        //  dd($plans);
        return view('admin.pages.plans.index', ['plans' =>$plans]);
    }

    public function create()
    {
            return view('admin.pages.plans.create');
    }

    public function store(storeUpdate $request)
    {

              $this->repository->create($request->all());

            return redirect()->route('plans.index');
    }

    public function show($url)
    {
                $plan = $this->repository->where('url', $url)->first();

                if(!$plan)
                return redirect()->back();

                return view('admin.pages.plans.show', [
                    'plan' => $plan
                ]);


    }

    public function destroy($url)
    {
                $plan = $this->repository->with('details')->where('url', $url)->first();

                if(!$plan)
                return redirect()->back();
                if($plan->details->count() > 0) {
                    return redirect()->back()->with('error', 'O plano esta vinculado a detalhes delete os detalhes antes');
                }

                $plan->delete();
                return redirect()->route('plans.index',['plan' => $plan]);


    }


    public function search(Request $request)
    {
         $filters = $request->except('_token');
           $plans = $this->repository->search($request->filter);

           return view('admin.pages.plans.index',
           ['plans' => $plans,
           'filters' => $filters]);


    }

    public function edit($url)
    {
                $plan = $this->repository->where('url', $url)->first();

                if(!$plan)
                return redirect()->back();
                $coin = 'AOA';

                return view('admin.pages.plans.edit',
                   ['plan' => $plan, 'coin'=>$coin]);


    }

    public function update( storeUpdate $request , $url)
    {
                $plan = $this->repository->where('url', $url)->first();

                if(!$plan)
                return redirect()->back();

            $plan->update($request->all());

            return redirect()->route('plans.index');



    }


}
