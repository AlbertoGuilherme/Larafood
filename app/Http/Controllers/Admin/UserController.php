<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateUser;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository ;
        public function __construct(User $user)
            {
                        $this->repository = $user;

            }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $users = $this->repository->latest()->TenantFilter()->paginate();

            return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {


        $data = $request->all();
        //ja pega o tenant do usuario logado e armazena
        $data['tenant_id'] = auth()->user()->tenant_id;

                $data ['password'] = bcrypt($data ['password']);

           $this->repository->create($data);

           return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Aqui dentro do show vai evitar q o usuario digite diretamente o id do usuario de outro tenant e consiga encontrar
        if(!$user = $this->repository->TenantFilter()->find($id))
        {
            return redirect()->back();
        }

        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            if(!$user = $this->repository->find($id))
            {
                return redirect()->back();
            }

            return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
            if(!$user = $this->repository->TenantFilter()->find($id))
            {
                return redirect()->back();
            }

                $data = $request->only(['name', 'email']);

                if($request->password){
                    $data['password'] = bcrypt($request->password);
                }
            $user->update($data);

            return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$user = $this->repository->TenantFilter()->find($id))
        {
            return redirect()->back();
        }

           $user->delete($id);
        return redirect()->route('users.index') ;
    }

    public function search(Request $request)
    {
        $filter = $request->only('filter');
        $users = $this->repository->where( function ($query) use ($request){
            if ($request->filter) {
                $query->orWhere('name', 'LIKE' ,"%{$request->filter}%");
                $query->orWhere('email', $request->filter);
            }

        })->latest()
        ->TenantFilter()
        ->paginate();

        return view('admin.pages.users.index',

        ['filters'  => $filter,
        'users' => $users]);

    }
}
