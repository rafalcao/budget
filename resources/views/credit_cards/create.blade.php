@extends('layout')

@section('title', __('actions.register') . ' ' . __('general.card'))

@section('body')
    <div class="wrapper my-3">
        <h2>{{ __('actions.register') }} {{ __('general.card') }}</h2>
        <div class="box mt-3">
            <form method="POST" action="/credit_cards" autocomplete="off">
                {{ csrf_field() }}
                <div class="box__section row">
                    <div class="row__column">
                        <div class="input input--small">
                            <label>{{ __('general.name_nickname') }}</label>
                            <input type="text" name="name" />
                            @include('partials.validation_error', ['payload' => 'name'])
                        </div>
                        <div class="input input--small">
                            <label>{{ __('general.due_day') }}</label>
                            <input type="text" name="due_day" />
                            @include('partials.validation_error', ['payload' => 'due_day'])
                        </div>
                    </div>
                </div>
                <div class="box__section box__section--highlight row row--right">
                    <div class="row__column row__column--compact row__column--middle">
                        <a href="/credit_cards">{{ __('general.cancel') }}</a>
                    </div>
                    <div class="row__column row__column--compact ml-2">
                        <button class="button">{{ __('actions.create') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
