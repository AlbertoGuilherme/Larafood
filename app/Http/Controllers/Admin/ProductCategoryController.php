<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Category,
    Product};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $product , $category;
    public function __construct(Product $product, Category $category)
    {
            $this->product = $product;
            $this->category = $category;
    }



    public function categories($idProduct)
    {

        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }
            //Uma vez que encontrou o product recupera a category, o segundo categories eh o metodo que esta la dentro da model Product

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.index',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function categoriesAvailable( Request $request,  $idProduct)
    {

        $product = $this->product->find($idProduct);
        if (!$product) {
            return redirect()->back();
        }

            $filters = $request->except('_token');

        $categories =$product->categoriesAvaliable($request->filter);
        return view('admin.pages.products.categories.categories',[
            'product' => $product,
            'categories' => $categories,
                             'filters'   =>$filters,
        ]);
    }

    public function attachProductCategory(Request $request , $idProduct)
    {
        // dd($request->category);
        $product = $this->product->find($idProduct);
        if (!$product) {
            return redirect()->back();
        }

        if(!$request->category || count($request->category) == 0){
            return redirect()->back()->with('info', 'Tem de escolher pelo menos uma categoria');
        }

            // dd($request->category);


        $product ->categories()->attach($request->category);

        return redirect()->route('products.categories', $product->id);

    }


    public function detachProductCategory($idProduct , $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);
        if (!$product || !$category) {
            return redirect()->back();
        }

        $product->categories()->detach($category);
        return redirect()->route('products.categories', $product->id);

    }
    public function products($idCategory)
    {
        $category = $this->category->find($idCategory);

        if (!$category ) {
            return redirect()->back();
        }

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products',[
            'category' => $category,
            'products' => $products,
        ]);

    }

}
