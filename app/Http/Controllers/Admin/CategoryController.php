<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = Category::all();
        $auth_user = Auth::user();

        if ($auth_user->is_admin) {
            return view('admin.categories.index', compact('categories', 'category'));
        } else return redirect()->route('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $auth_user = Auth::user();

        if ($auth_user->is_admin) {
            return view('admin.categories.create', compact('categories'));
        } else return redirect()->route('admin.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|max:255|min:2',
        ]);

        $params['slug'] = str_replace(' ', '-', $params['name']);

        $category = Category::create($params);

        return redirect()->route('admin.categories.index', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $auth_user = Auth::user();

        if ($auth_user->is_admin) {
            return view('admin.categories.edit', compact('category'));
        } else return redirect()->route('admin.home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $params = $request->validate([
            'name' => 'required|max:255|min:2',
        ]);

        $params['slug'] = str_replace(' ', '-', $params['name']);

        $category->update($params);

        return redirect()->route('admin.categories.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $auth_user = Auth::user();

        if ($auth_user->is_admin) {
            $category->delete();
            return redirect()->route('admin.categories.index');
        } else return redirect()->route('admin.home');
    }
}
