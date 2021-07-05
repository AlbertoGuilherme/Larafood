<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\storeUpdateProduct;
use App\Models\{
    Product,
    Category
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

      protected $repository ;

      public function __construct(Product $product)
      {
        $this->repository = $product;
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $products)
    {

        $products = $this->repository->latest()->paginate();

        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\storeUpdateProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUpdateProduct $request)
    {
          $data = $request->all();

          $tenant = auth()->user()->tenant;
          if($request->hasFile('image') && $request->image->isValid())
          {
              $data['image']= $request->image->store("tenant/{$tenant->uuid}/products");
          }
              $this->repository->create($data);

              return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( !$product = $this->repository->find($id))
        {
            return redirect()->back();
        }

        return view('admin.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $product = $this->repository->find($id);
            return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\storeUpdateProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUpdateProduct $request, $id)
    {

        if( !$product = $this->repository->find($id))
        {
            return redirect()->back();
        }
        $data = $request->all();

        $tenant = auth()->user()->tenant;



        if($request->hasFile('image') && $request->image->isValid())
        {
            if(Storage::exists($product->image)){
                Storage::delete($product->image);
            }
            $data['image']= $request->image->store("tenant/{$tenant->uuid}/products");
        }

        $product->update($data);
         return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            if(!$product=$this->repository->find($id)){
                return redirect()->back();
            }

            if(Storage::exists($product->image)){
                Storage::delete($product->image);
            }

            $product->delete();

            return redirect()->route('products.index');
    }
}
