<?php

namespace App\Http\Controllers;

use App\Models\Proverb;
use Illuminate\Http\Request;

class ProverbController extends Controller
{
    /**
     * Display a listing of the proverbs
     *
     * @param  \App\Models\Proverb  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $proverbs = Proverb::simplePaginate(15);
        return view('proverbs.index', compact('proverbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proverbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rq
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        Proverb::create($rq->all());
        return redirect()->route('proverbs.index')->with('success', 'Proverb created successfully.');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('proverbs.edit');
    }

    /**
     * Show the form for viewing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('proverbs.view');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\Request  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Proverb $md, Request $rq)
    {
        $md->update($rq->all());

        return back()->withStatus(__('Proverb successfully updated.'));
    }
}
