<?php

namespace App\Http\Controllers;

use App\Models\Saying;
use Illuminate\Http\Request;

class SayingController extends Controller
{
    /**
     * Display a listing of the sayings
     *
     * @param  \App\Models\Saying  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sayings = Saying::simplePaginate(15);
        return view('sayings.index', compact('sayings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sayings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rq
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        Saying::create($rq->all());
        return redirect()->route('sayings.index')->with('success', 'Saying created successfully.');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('sayings.edit');
    }

    /**
     * Show the form for viewing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('sayings.view');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\Request  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Saying $md, Request $rq)
    {
        $md->update($rq->all());

        return back()->withStatus(__('Saying successfully updated.'));
    }
}
