@extends('layouts.app')

@section('content')
    <div class="login-form">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-grey">{{ __('Reset password') }}</h3>
                        <div class="box">
                            {{Form::open(["route" => "password.email", "method" => "POST"])}}
                                <div class="field">
                                    <div class="control">
                                        {{Form::email("email", old("email"), ["class" => "input", "placeholder" => __('e-mail address'), "required" => ""])}}
                                    </div>
                                </div>
                                {{Form::submit(__("Send password reset link"), ["class" => "button is-block is-info is-fullwidth"])}}
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection