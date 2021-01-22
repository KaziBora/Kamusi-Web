<?php

namespace App\Http\Controllers;

use App\Models\Idiom;
use Illuminate\Http\Request;

class IdiomController extends Controller
{
    /**
     * Display a listing of the idioms
     *
     * @param  \App\Models\Idiom  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $idioms = Idiom::simplePaginate(15);
        return view('idioms.index', compact('idioms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idioms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rq
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        Idiom::create($rq->all());
        return redirect()->route('idioms.index')->with('success', 'Idiom created successfully.');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('idioms.edit');
    }

    /**
     * Show the form for viewing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('idioms.view');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\Request  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Idiom $md, Request $rq)
    {
        $md->update($rq->all());

        return back()->withStatus(__('Idiom successfully updated.'));
    }
}
