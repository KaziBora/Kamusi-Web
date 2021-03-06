<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the words
     *
     * @param  \App\Models\Word  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $words = Word::simplePaginate(15);
        return view('words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('words.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rq
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        Word::create($rq->all());
        return redirect()->route('words.index')->with('success', 'Word created successfully.');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('words.edit');
    }

    /**
     * Show the form for viewing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('words.view');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\Request  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Word $md, Request $rq)
    {
        $md->update($rq->all());

        return back()->withStatus(__('Word successfully updated.'));
    }
}
