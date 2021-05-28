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
}
