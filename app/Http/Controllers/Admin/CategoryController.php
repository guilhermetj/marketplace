<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
	/**
	 * @var Category
	 */
	private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $categories = $this->category->paginate(10);

	    return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.categories.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CategoryRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function store(CategoryRequest $request)
    {
	    $data = $request->all();

	    $category = $this->category->create($data);

	    return redirect()
            ->route('categories.index')
            ->with('message', 'Categoria adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
	    $category = $this->category->findOrFail($category);

	    return view('admin.categories.edit', compact('category'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param CategoryRequest $request
	 * @param  int $category
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function update(CategoryRequest $request, $category)
    {
	    $data = $request->all();

	    $category = $this->category->find($category);
	    $category->update($data);

	    return redirect()
            ->route('categories.index')
            ->with('message', 'Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
	    $category = $this->category->find($category);
	    $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('message', 'Categoria Removida com sucesso');
    }
}