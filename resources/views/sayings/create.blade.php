@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('partials.header', [
        'title' => __('Create a New User'),
        //'description' => __('User profile details'),
        //'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data" >
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-first_name">{{ __('First Name') }}</label>
                                            <input type="text" name="first_name" id="input-first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="">

                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-last_name">{{ __('Last Name') }}</label>
                                            <input type="text" name="last_name" id="input-last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="">

                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    
                                </div>

                                <div class="row">
                                    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
                                        <div class="form-group{{ $errors->has('dobirth') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-dobirth">{{ __('Date of Birth') }}</label>
                                            <input type="text" name="dobirth" id="input-dobirth" class="form-control form-control-alternative{{ $errors->has('dobirth') ? ' is-invalid' : '' }}" value="{{ date('Y-m-d') }}">

                                            @if ($errors->has('dobirth'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dobirth') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
                                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-gender">{{ __('Gender') }}</label>
                                            <input type="text" name="gender" id="input-gender" class="form-control form-control-alternative{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="">

                                            @if ($errors->has('gender'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
                                        <div class="form-group{{ $errors->has('town') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-town">{{ __('Town') }}</label>
                                            <input type="text" name="town" id="input-town" class="form-control form-control-alternative{{ $errors->has('town') ? ' is-invalid' : '' }}">

                                            @if ($errors->has('town'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('town') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                            <input type="text" name="country" id="input-country" class="form-control form-control-alternative{{ $errors->has('country') ? ' is-invalid' : '' }}" value="KE" required>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                  
                                <div class="form-group{{ $errors->has('about') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-about">{{ __('About') }}</label>
                                    <input type="text" name="about" id="input-about" class="form-control form-control-alternative{{ $errors->has('about') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('about'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email Address') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Preferred Password') }}</label>
                                    <input type="password" name="password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Register User') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
