<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCategoryRequest;
use App\Models\Category;
use App\Models\tareas;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validated([
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();

        // O //

        // Category::create([
        //     'name' => $request->input('name'),
        //     'color' => $request->input('color'),
        // ]);

        // O //

        // Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Nueva categoria agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categorid)
    {
        $category = Category::find($categorid);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(SaveCategoryRequest $request, $categorid)
    {
        $category = Category::find($categorid);
        // O //
        $category->update($request->validated());
        // $category->name = $request->name;
        // $category->color = $request->color;
        // $category->save();

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorid)
    {
        $category = Category::find($categorid);
        $category-> tareas()->each(function($tareas){
            $tareas-> delete();
        });
        $category-> delete();

        return redirect()->route('categories.index')->with('success', 'Categoria Eliminada');
    }

}
