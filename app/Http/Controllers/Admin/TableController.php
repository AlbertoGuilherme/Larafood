<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateTable;
use App\Models\Table;

class TableController extends Controller
{
    private $repository ;

    public function __construct(Table $table)
    {
         $this->repository = $table;
         $this->middleware(['can:tables']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $tables = $this->repository->latest()->paginate();

            return view('admin.pages.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTable $request)
    {


       $this->repository->create($request->all());

        return redirect()->route('tables.index');

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
       if( !$table = $this->repository->find($id))
       {
           return redirect()->back();
       }
        return view('admin.pages.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !$table = $this->repository->first())
       {
           return redirect()->back();
       }
        return view('admin.pages.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTable $request, $id)
    {
        if( !$table = $this->repository->find($id))
       {
           return redirect()->back();
       }

       $table->update($request->all());
        return redirect()->route('tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$table = $this->repository->find($id))
        {
            return redirect()->back();
        }

        $table->delete();

        return redirect()->route('tables.index');

    }

    public function search(Request $request)
    {
        $filter = $request->only('filter');
        $tables = $this->repository->where( function ($query) use ($request){
            if ($request->filter) {
                $query->orWhere('identify', 'LIKE' ,"%{$request->filter}%");
                $query->orWhere('description', $request->filter);
            }

        })->latest()
        ->paginate();

        return view('admin.pages.tables.index',

        ['filters'  => $filter,
        'tables' => $tables]);

    }
}
