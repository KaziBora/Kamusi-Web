<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $md
     * @return \Illuminate\View\View
     */
    public function index(User $md)
    {
        $users = User::latest()->paginate(5);
        return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rq
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        //User::create($rq->all());

        User::create([
            'first_name' => $rq->get('first_name'),
            'last_name' => $rq->get('last_name'),
            'dobirth' => $rq->get('dobirth'),
            'gender' => $rq->get('gender'),
            'about' => $rq->get('about'),
            'town' => $rq->get('town'),
            'country' => $rq->get('country'),
            'email' => $rq->get('email'),
            'password' => Hash::make(
                $rq->get('password')),
        ]);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('users.edit');
    }

    /**
     * Show the form for viewing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('users.view');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\UserRequest  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $rq)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($rq->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $rq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $rq)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($rq->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
