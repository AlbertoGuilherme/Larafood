<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCategory;

class CategoryController extends Controller
{
    private $repository ;

    public function __construct(Category $category)
    {
         $this->repository = $category;
         $this->middleware(['can:categories']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $categories = $this->repository->latest()->paginate();

            return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
       $this->repository->create($request->all());

        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * Aqui nao precisamos mais passar a constraint where porque ja o fizemos no scope
         */
       if( !$category = $this->repository->find($id))
       {
           return redirect()->back();
       }
        return view('admin.pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !$category = $this->repository->first())
       {
           return redirect()->back();
       }
        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        if( !$category = $this->repository->find($id))
       {
           return redirect()->back();
       }

       $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$category = $this->repository->find($id))
        {
            return redirect()->back();
        }

        $category->delete();

        return redirect()->route('categories.index');

    }

    public function search(Request $request)
    {
        $filter = $request->only('filter');
        $categories = $this->repository->where( function ($query) use ($request){
            if ($request->filter) {
                $query->orWhere('name', 'LIKE' ,"%{$request->filter}%");
                $query->orWhere('description', $request->filter);
            }

        })->latest()
        ->paginate();

        return view('admin.pages.categories.index',

        ['filters'  => $filter,
        'categories' => $categories]);

    }


}
