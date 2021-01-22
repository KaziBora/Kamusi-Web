<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories
     *
     * @param  \App\Models\Category  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$categories = Category::paginate(10);
        $categories = Category::select(['*', DB::raw('(SELECT COUNT(*) FROM words WHERE words.trivia_cart = categories.id) as words')])->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rq
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        Category::create($rq->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('categories.edit');
    }

    /**
     * Show the form for viewing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('categories.view');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\Request  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $md, Request $rq)
    {
        $md->update($rq->all());

        return back()->withStatus(__('Category successfully updated.'));
    }
}
