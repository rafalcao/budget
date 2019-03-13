@extends('layout')

@section('title', 'Reset Password')

@section('body')
    <div class="wrapper wrapper--narrow my-3">
        <h2 class="text-center mb-3">{{ __('register.reset') }}</h2>
        <div class="box">
            <div class="box__section">
                <form method="POST">
                    {{ csrf_field() }}
                    @if ($token)
                        <input type="hidden" name="token" value="{{ $token }}" />
                        <div class="input">
                            <label>{{ __('register.password') }}</label>
                            <input type="password" name="password" />
                        </div>
                        <div class="input">
                            <label>{{ __('register.verify_password') }}</label>
                            <input type="password" name="password_confirmation" />
                        </div>
                    @else
                        <div class="input">
                            <label>{{ __('register.email') }}</label>
                            <input type="email" name="email" />
                        </div>
                    @endif
                    <button class="button">{{ __('register.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
