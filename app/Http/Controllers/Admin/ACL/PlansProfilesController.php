<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Profile;
class PlansProfilesController extends Controller
{
    protected $plan , $profile;
    public function __construct(Plan $plan, Profile $profile)
    {
            $this->plan = $plan;
            $this->profile = $profile;

    }



    public function profiles($idPlan)
    {
            $plan = $this->plan->find($idPlan);
        if (!$plan) {
            return redirect()->back();
        }
            //Uma vez que encontrou o plan recupera a profile, o segundo profiles eh o metodo que esta la dentro da model Plan

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.index',[
            'plan' => $plan,
            'profiles' => $profiles,
        ]);
    }

    public function profilesAvailable( Request $request,  $idPlan)
    {
        $plan = $this->plan->find($idPlan);
        if (!$plan) {
            return redirect()->back();
        }

            $filters = $request->except('_token');

        $profiles =$plan->profileAvaliable($request->filter);
        return view('admin.pages.plans.profiles.profiles',[
            'plan' => $plan,
            'profiles' => $profiles,
                             'filters'   =>$filters,
        ]);
    }

    public function attachPlanProfile(Request $request , $idPlan)
    {
        $plan = $this->plan->find($idPlan);
        if (!$plan) {
            return redirect()->back();
        }

        if(!$request->profile || count($request->profile) == 0){
            return redirect()->back()->with('info', 'Tem de escolher pelo menos uma permissao');
        }

            // dd($request->profile);


        $plan ->profiles()->attach($request->profile);

        return redirect()->route('plans.profiles', $plan->id);

    }


    public function detachPlanProfile($idPlan , $idProfile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);
        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);
        return redirect()->route('plans.profiles', $plan->id);

    }
    public function plans($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile ) {
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans',[
            'profile' => $profile,
            'plans' => $plans,
        ]);

    }

}
