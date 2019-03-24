@extends('layout')

@section('body')
    <div class="wrapper my-3">
        <div class="box">
            <form method="POST" action="/ideas">
                {{ csrf_field() }}
                <div class="box__section">
                    <div class="row__column input input--small">
                        <label>{{ __('fields.name') }}</label>
                        <input type="text" name="name" />
                        @include('partials.validation_error', ['payload' => 'name'])
                    </div>
                    <div class="row__column input input--small">
                        <label>{{ __('fields.email') }}</label>
                        <input type="email" name="email" />
                        @include('partials.validation_error', ['payload' => 'email'])
                    </div>
                    <div class="input input--small">
                        <label>{{ __("general.message") }}</label>
                        <textarea name="body"></textarea>
                        @include('partials.validation_error', ['payload' => 'body'])
                    </div>
                    <button class="button">{{ __("general.submit") }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
