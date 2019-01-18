@extends('layouts.app')

@section('content')
    <div class="login-form">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-grey">{{ __('Register') }}</h3>
                        <p class="subtitle has-text-grey">{{ __('Please register to proceed.') }}</p>
                        <div class="box">
                            {{Form::open(["route" => "register", "method" => "POST"])}}
                                <div class="field">
                                    <div class="control">
                                        {{Form::text("name", old("name"), ["class" => "input", "placeholder" => __('name'), "required" => "", "autofocus" => ""])}}
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        {{Form::text("username", old("username"), ["class" => "input", "placeholder" => __('username (VID)'), "required" => ""])}}
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        {{Form::text("staff", old("staff"), ["class" => "input", "placeholder" => __('staff position (without "IVAO-")'), "required" => ""])}}
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        {{Form::email("email", old("email"), ["class" => "input", "placeholder" => __('e-mail address'), "required" => ""])}}
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        {{Form::password("password", ["class" => "input", "placeholder" => __("password"), "required" => ""])}}
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        {{Form::password("password_confirmation", ["class" => "input", "placeholder" => __("password again"), "required" => ""])}}
                                    </div>
                                </div>
                                {{Form::submit(__("Register"), ["class" => "button is-block is-info is-fullwidth"])}}
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection