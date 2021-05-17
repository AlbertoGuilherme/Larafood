<?php

namespace App\Http\Controllers;
use App\Model\Product;
use App\Http\Requests\storeUpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $request;
    protected $repository;

    public function __construct(Request $request , Product $product){

        $this->request=$request;
        $this->repository=$product;
    //    $this->middleware('auth');

    // $this->middleware('auth')->only([
    //     'create', 'store'
    // ]);

    //   $this->middleware('auth')->except('index');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $produtos = Product::latest()->paginate();
         return view('site.home',['produtos'=>$produtos,]);



        // return view('site.home', ['teste'  =>$teste]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\storeUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUpdateProductRequest $request)
    {


        //   $request->validate([
        //     'name' => 'required | min:3| max:1000',
        //     'description' => 'required|min:3| max: 1000',
        //     'photo' => 'required|image'
        //   ]);
        /* SEMPRE QUE FIZERMOS ALGUMA ALTERACAO EM CONFIG
           RODAR O COMANDO
           php artisan config:clear-> vai limpar possivel cache com configuracao anterior
        */
    //     $mes = date('M');
    // //   dd($request->all());
    //   if($request->file('photo')->isValid()){
    //     //  dd(  $request->photo->store('products' . ''));
    //      $nameFile = $request->name . '.' . $request->photo->extension();
    //     dd( $request->file('photo')->storeAs($mes, $nameFile));
    //   }



   $data =  $request->only('name', 'description', 'price');

   if($request->hasFile('image') && $request->image->isValid())
   {
      $imagePath = $request->image->store('products');
      $data['image'] = $imagePath;
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
        //  $product = Product::where('id', $id);
       $product = $this->repository->find($id);//se nao encontrar o id retorna null

       if(!$product)
         return redirect()->back();
         return view('site.show', [
             'product' => $product
         ]);
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

        if(!$product)
         return redirect()->back();

        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\storeUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUpdateProductRequest $request, $id)
    {
        $product = $this->repository->find($id);

        if(!$product)
         return redirect()->back();
         $data = $request->all();

         if($request->hasFile('image') && $request->image->isValid()){
             if($product->image && Storage::exists($product->image)){
                 Storage::delete($product->image);
             }
      $imagePath = $request->image->store('products');
      $data['image'] = $imagePath;
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
        $product = $this->repository->find($id);

        if(!$product)
         return redirect()->back();

         $product->delete();

         return redirect()->route('products.index');
    }

    public function search(Request $request){

            $filters = $request->except('_token');
             $produtos = $this->repository->search($request->filtrar);



            return view('site.home', ['produtos' => $produtos , 'filters'=> $filters]);

    }
}
