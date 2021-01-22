@extends('layouts.app', ['title' => __('Proverb Details')])

@section('content')
    @include('partials.header', [
        'title' => __('Swahili Proverbs'),
    ])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <h2 class="mb-0">Methali</h2>
                        </div>

                        <div class="col-6">
                            {!! $proverbs->links() !!}
                        </div>
                        
                        <div class="col-3 text-right">
                            <a href="{{ route('proverbs.create') }}" class="btn btn-sm btn-primary">Add a Proverb</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12"></div>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Proverb</th>
                                <th scope="col">Meaning</th>
                                <th scope="col">Synonyms</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($proverbs as $proverb)
                            <tr>
                                <td align="right">{{ $proverb->id }}.</td>
                                <td valign="top">{{ $proverb->title }}</td>
                                <td style="white-space: normal;">{{ $proverb->meaning }}</td>
                                <td style="white-space: normal;">{{ $proverb->synonyms }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('proverbs.edit', $proverb->id) }}">Edit</a>
                                            <a class="dropdown-item" href="">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                
                <div class="card-footer py-4">
                    {!! $proverbs->links() !!}
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
