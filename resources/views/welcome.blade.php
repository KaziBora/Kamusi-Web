@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Kamusi ya Kiswahili') }}</h1>
                        <table>
                            <tr>
                                <td>
                                    <img src="{{ asset('argon') }}/img/phone.png" width="200px" height="380px"
                                    style='background: url("{{ asset('argon') }}/img/screenshot_1.jpg"); 
                                    background-position: 22px 8px; background-size: 155px 344px; background-repeat: no-repeat;' />
                                </td>
                                <td>
                                    <img src="{{ asset('argon') }}/img/phone.png" width="200px" height="380px"
                                    style='background: url("{{ asset('argon') }}/img/screenshot_2.jpg"); 
                                    background-position: 22px 8px; background-size: 155px 344px; background-repeat: no-repeat;' />
                                </td>
                                <td>
                                    <img src="{{ asset('argon') }}/img/phone.png" width="200px" height="380px"
                                    style='background: url("{{ asset('argon') }}/img/screenshot_3.jpg"); 
                                    background-position: 22px 8px; background-size: 155px 344px; background-repeat: no-repeat;' />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
