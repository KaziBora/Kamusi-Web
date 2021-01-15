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
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        User::create($rq->all());
        //return redirect('/users');
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    public function storex(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'country' => 'required',
            'town' => 'required',
            //'dobirth' => '01/01/2021',
            //'gender' => 0,
            //'title' => 'Admin',
            //'bio' => 'Happy to help',
            'status' => 1,
            //'mobile' => '+2547-',
            'email' => 'required',
            'password' => 'required',
        ]);*/

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
        //$u = new User();
        //return $this->update($rq, $u);
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
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
