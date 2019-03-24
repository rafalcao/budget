@extends('layout')

@section('title', __('models.cards'))

@section('body')
<div class="wrapper my-3">
    <div class="row mb-3">
        <div class="row__column row__column--middle">
            <h2>{{ __('models.cards') }}</h2>
        </div>
        <div class="row__column row__column--compact row__column--middle">
            <a href="/credit_cards/create" class="button">{{ __('actions.register') }} {{ __('general.card') }}</a>
        </div>
    </div>
    <div class="box mt-3">
        @if (count($creditCards))
        @foreach ($creditCards as $card)
        <div class="box__section row">
            <div class="row__column row__column--middle">
                <div class="color-dark">
                    {{ $card->name }}
                </div>
            </div>
            <div class="row__column row__column--middle">
                <div class="row__column row__column--compact" style="font-size: 14px; font-weight: 600;">
                    <i class="far fa-clock"></i> {{ __('general.due_in') }} {{ $card->due_day }}
                </div>
            </div>
            <div class="row__column row__column--middle">
                <span class="status-{{ $card->getLabelStatus() }}">{{ __('general.'.$card->getLabelStatus()) }}</span>
            </div>
            <div class="row__column-right row__column--middle">
                <a href="/credit_cards/{{ $card->id }}/edit">{{ __('actions.edit') }}</a>
            </div>
        </div>
        @endforeach
        @else
        @include('partials.empty_state', ['payload' => '$creditCards'])
        @endif
    </div>
</div>
@endsection
