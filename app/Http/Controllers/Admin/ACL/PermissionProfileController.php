<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Profile;


class PermissionProfileController extends Controller
{
    protected $profile , $permission;
    public function __construct(Profile $profile, Permission $permission)
    {
            $this->profile = $profile;
            $this->permission = $permission;
    }



    public function permissions($idProfile)
    {
            $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back();
        }
            //Uma vez que encontrou o profile recupera a permission, o segundo permissions eh o metodo que esta la dentro da model Profile

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index',[
            'profile' => $profile,
            'permissions' => $permissions,
        ]);
    }

    public function permissionsAvailable( Request $request,  $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back();
        }

            $filters = $request->except('_token');

        $permissions =$profile->permissionAvaliable($request->filter);
        return view('admin.pages.profiles.permissions.permissionAvailable',[
            'profile' => $profile,
            'permissions' => $permissions,
                             'filters'   =>$filters,
        ]);
    }

    public function attachPermissionProfile(Request $request , $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back();
        }

        if(!$request->permission || count($request->permission) == 0){
            return redirect()->back()->with('info', 'Tem de escolher pelo menos uma permissao');
        }

            // dd($request->permission);


        $profile ->permissions()->attach($request->permission);

        return redirect()->route('profiles.permission', $profile->id);

    }


    public function detachPermissionProfile($idProfile , $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);
        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);
        return redirect()->route('profiles.permission', $profile->id);

    }
    public function profiles($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if (!$permission ) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles',[
            'permission' => $permission,
            'profiles' => $profiles,
        ]);

    }


}
