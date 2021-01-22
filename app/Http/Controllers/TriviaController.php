<?php

namespace App\Http\Controllers;

use App\Models\Trivia;
use Illuminate\Http\Request;

class TriviaController extends Controller
{
    /**
     * Display a listing of the trivia
     *
     * @param  \App\Models\Trivia  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $trivia = Trivia::latest()->paginate(5);
        return view('trivia.index', compact('trivia'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trivia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rq
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        Trivia::create($rq->all());
        return redirect()->route('trivia.index')->with('success', 'Trivia created successfully.');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('trivia.edit');
    }

    /**
     * Show the form for viewing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('trivia.view');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\Request  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Trivia $md, Request $rq)
    {
        $md->update($rq->all());

        return back()->withStatus(__('Trivia successfully updated.'));
    }
}
