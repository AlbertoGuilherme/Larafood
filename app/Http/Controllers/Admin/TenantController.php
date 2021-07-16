<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    protected $repository ;

    public function __construct(Tenant $tenant)
    {
      $this->repository = $tenant;
      $this->middleware(['can:tenants']);
    }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Tenant $tenants)
  {

      $tenants = $this->repository->latest()->paginate();

      return view('admin.pages.tenants.index', compact('tenants'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('admin.pages.tenants.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\storeUpdateTenant  $request
   * @return \Illuminate\Http\Response
   */
  public function store(storeUpdateTenant $request)
  {
        $data = $request->all();

        $tenant = auth()->user()->tenant;
        if($request->hasFile('logo') && $request->logo->isValid())
        {
            $data['logo']= $request->logo->store("tenant/{$tenant->uuid}/logo");
        }
            $this->repository->create($data);

            return redirect()->route('tenants.index');


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      if( !$tenant = $this->repository->with('plan')->find($id))
      {
          return redirect()->back();
      }

      return view('admin.pages.tenants.show', compact('tenant'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
          $tenant = $this->repository->find($id);
          return view('admin.pages.tenants.edit', compact('tenant'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\storeUpdateTenant  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(storeUpdateTenant $request, $id)
  {

      if( !$tenant = $this->repository->find($id))
      {
          return redirect()->back();
      }
      $data = $request->all();

      $tenant = auth()->user()->tenant;



      if($request->hasFile('logo') && $request->logo->isValid())
      {
          if(Storage::exists($tenant->logo)){
              Storage::delete($tenant->logo);
          }
          $data['logo']= $request->logo->store("tenant/{$tenant->uuid}/tenants");
      }

      $tenant->update($data);
       return redirect()->route('tenants.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
          if(!$tenant=$this->repository->find($id)){
              return redirect()->back();
          }

          if(Storage::exists($tenant->logo)){
              Storage::delete($tenant->logo);
          }

          $tenant->delete();

          return redirect()->route('tenants.index');
  }
}
