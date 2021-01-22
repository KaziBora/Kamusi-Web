@extends('layouts.app', ['title' => __('Word Details')])

@section('content')
    @include('partials.header', [
        'title' => __('Create a New Word'),
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form method="post" action="{{ route('words.store') }}" enctype="multipart/form-data" >
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
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('The Word') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('The Meaning') }}</label>
                                    <textarea name="meaning" id="input-meaning" class="form-control form-control-alternative{{ $errors->has('meaning') ? ' is-invalid' : '' }}"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('meaning') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('synonyms') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-synonyms">{{ __('Synonyms') }}</label>
                                    <input type="text" name="synonyms" id="input-synonyms" class="form-control form-control-alternative{{ $errors->has('synonyms') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('synonyms'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('synonyms') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('conjugation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-conjugation">{{ __('Conjugation') }}</label>
                                    <textarea name="conjugation" id="input-conjugation" class="form-control form-control-alternative{{ $errors->has('conjugation') ? ' is-invalid' : '' }}"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('conjugation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Create Word') }}</button>
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
