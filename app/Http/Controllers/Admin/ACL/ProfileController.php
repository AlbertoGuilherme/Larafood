<?php

namespace App\Http\Controllers\Admin\ACL;
use App\Http\Requests\StoreUpdateProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;


class ProfileController extends Controller
{
        protected $repository ;
        public function __construct(Profile $profile)
            {
                        $this->repository = $profile;
                        $this->middleware(['can:profiles']);

            }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $profiles = $this->repository->paginate();

            return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfileRequest $request)
    {
           $this->repository->create($request->all());

           return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$profile = $this->repository->find($id))
        {
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            if(!$profile = $this->repository->find($id))
            {
                return redirect()->back();
            }

            return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfileRequest $request, $id)
    {
            if(!$profile = $this->repository->find($id))
            {
                return redirect()->back();
            }

            $profile->update($request->all());

            return redirect()->route('profiles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$profile = $this->repository->find($id))
        {
            return redirect()->back();
        }

           $profile->delete($id);
        return redirect()->route('profiles.index') ;
    }

    public function search(Request $request)
    {
        $filter = $request->except('_token');
        $profiles = $this->repository->search($request->filter);

        return view('admin.pages.profiles.index',

        ['filter'  => $filter,
        'profiles' => $profiles]);

    }
}
