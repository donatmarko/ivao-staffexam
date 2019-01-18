@extends('layouts.app')

@section('content')
    <div class="login-form">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-grey">{{ __('Login') }}</h3>
                        <p class="subtitle has-text-grey">{{ __('Please login to proceed.') }}</p>
                        <div class="box">
                            {{Form::open(["route" => "login", "method" => "POST"])}}
                                <div class="field">
                                    <div class="control">
                                        {{Form::text("username", old("username"), ["class" => "input is-large", "placeholder" => __('username (VID)'), "required" => "", "autofocus" => ""])}}
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        {{Form::password("password", ["class" => "input is-large", "placeholder" => __("password"), "required" => ""])}}
                                    </div>
                                </div>
                                {{Form::submit(__("Login"), ["class" => "button is-block is-info is-large is-fullwidth"])}}
                            {{Form::close()}}
                        </div>
                        <p class="has-text-grey">
                            <a href="/register">{{ __('Register') }}</a> &nbsp;·&nbsp;
                            <a href="{{route("password.request")}}">{{ __('Forgot Your Password?') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection