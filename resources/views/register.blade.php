@extends('layout')

@section('title', 'Register')

@section('body')
    <div class="wrapper wrapper--narrow my-3">
        <h2 class="text-center mb-3">{{ __('register.register') }}</h2>
        <div class="box">
            <div class="box__section">
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="input">
                        <label>{{ __('register.fullname') }}</label>
                        <input type="text" name="name" value="{{ old('name') }}" />
                        @include('partials.validation_error', ['payload' => 'name'])
                    </div>
                    <div class="input">
                        <label>{{ __('register.email') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" />
                        @include('partials.validation_error', ['payload' => 'email'])
                    </div>
                    <div class="input">
                        <label>{{ __('register.password') }}</label>
                        <input type="password" name="password" />
                        @include('partials.validation_error', ['payload' => 'password'])
                    </div>
                    <div class="input">
                        <label>{{ __('register.verify_password') }}</label>
                        <input type="password" name="password_confirmation" />
                        @include('partials.validation_error', ['payload' => 'password_confirmation'])
                    </div>
                    <div class="input">
                        <label>{{ __('register.currency') }}</label>
                        <select name="currency">
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}" {{ old('currency') == $currency->id ? 'selected' : '' }}>{!! $currency->symbol !!} &middot; {{ $currency->name }}</option>
                            @endforeach
                        </select>
                        @include('partials.validation_error', ['payload' => 'currency'])
                    </div>
                    <button class="button">{{ __('register.register') }}</button>
                </form>
            </div>
            <div class="box__section box__section--highlight text-center">
                <a href="/login">{{ __('register.already') }}</a>
            </div>
        </div>
    </div>
@endsection
