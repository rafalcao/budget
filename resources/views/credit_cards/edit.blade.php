@extends('layout')

@section('title', __('actions.edit') . ' ' . __('general.card'))

@section('body')
    <div class="wrapper my-3">
        <h2>{{ __('actions.edit') }} {{ __('general.card') }}</h2>
        <div class="box mt-3">
            <form method="POST" action="/credit_cards/{{ $creditCard->id }}" autocomplete="off">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box__section row">
                    <div class="row__column">
                        <div class="input input--small">
                            <label>{{ __('general.name_nickname') }}</label>
                            <input type="text" name="name" value="{{ $creditCard->name }}" />
                            @include('partials.validation_error', ['payload' => 'name'])
                        </div>

                        <div class="input input--small mb-0">
                            <label>{{ __('general.due_day') }}</label>
                            <input type="text" name="due_day" value="{{ $creditCard->due_day }}" />
                            @include('partials.validation_error', ['payload' => 'due_day'])
                        </div>
                    </div>
                    <div class="row__column">
                        <div class="input input--small mb-0">
                            <label>Status</label>
                            <select name="status">
                                <option name="status" value="1" {{ $creditCard->status ? 'selected' : '' }} />{{ __('general.enable') }}</option>
                                <option name="status" value="0" {{ $creditCard->status ? '' : 'selected' }} />{{ __('general.disable') }}</option>
                            </select>
                            @include('partials.validation_error', ['payload' => 'status'])
                        </div>
                    </div>
                </div>
                <div class="box__section box__section--highlight row row--right">
                    <div class="row__column row__column--compact row__column--middle">
                        <a href="/credit_cards">{{ __('actions.cancel') }}</a>
                    </div>
                    <div class="row__column row__column--compact ml-2">
                        <button class="button">@lang('actions.save')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
