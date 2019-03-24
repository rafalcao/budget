<!DOCTYPE html>
<html>
    <head>
        <title>{{ View::hasSection('title') ? View::getSection('title') . ' - ' . config('app.name') : config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="/storage/fontawesome/all.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,600i" />
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" />
        <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <style>
            .ct-series-a .ct-slice-donut-solid {
                fill: #179BD1;
            }

            .ct-series-b .ct-slice-donut-solid {
                fill: #E4E8EB;
            }

            .ct-series-a .ct-line {
                stroke-width: 2px;
                stroke: #179BD1;
            }

            .theme-dark .ct-label {
                color: #758193;
            }

            [v-cloak] {
                display: none;
            }
        </style>
    </head>
    <body class="theme-{{ Auth::check() ? Auth::user()->theme : 'light' }}">
        <div id="app">
            @if (Auth::check())
                <div class="navigation">
                    <div class="wrapper">
                        <ul class="navigation__menu">
                            <li>
                                <dropdown>

                                    <span slot="button">
                                        <img src="{{ Auth::user()->avatar }}" class="avatar mr-05" /> <i class="fas fa-caret-down fa-sm"></i>
                                    </span>
                                    <ul slot="menu" v-cloak>
                                        <li>
                                            <a href="/tags">{{ __('models.tags') }}</a>
                                        </li>
                                        <li>
                                            <a href="/credit_cards">{{ __('models.cards') }}</a>
                                        </li>
                                        <li>
                                            <a href="/settings">{{ __('pages.settings') }}</a>
                                        </li>
                                        <li>
                                            <a href="/logout">{{ __('pages.log_out') }}</a>
                                        </li>
                                    </ul>
                                </dropdown>

                            </li>
                            <?php /* {{ session('space')->name }} */ ?>
                        </ul>
                        <ul class="navigation__menu">
                            <li>
                                <a href="/dashboard" {!! (Request::path() == 'dashboard') ? 'class="active"' : '' !!}><i class="fas fa-chart-line color-green"></i> <span class="hidden ml-05">{{ __('models.dashboard') }}</span></a>
                            </li>
                            <li>
                                <a href="/balance" {!! (Request::path() == 'balance') ? 'class="active"' : '' !!}><i class="fas fa-balance-scale color-green"></i> <span class="hidden ml-05">{{ __('models.balance') }}</span></a>
                            </li>
                            <li>
                                <a href="/releases" {!! (Request::path() == 'releases') ? 'class="active"' : '' !!}><i class="far fa-money-bill-alt color-green"></i> <span class="hidden ml-05">{{ __('models.releases') }}</span></a>
                            </li>
                            <li>
                                <a href="/debts" {!! (Request::path() == 'debts') ? 'class="active"' : '' !!}><i class="fab fa-gripfire color-red"></i> <span class="hidden ml-05">{{ __('models.debts') }}</span></a>
                            </li>
                            <li>
                                <a href="/variable" {!! (Request::path() == 'variable') ? 'class="active"' : '' !!}><i class="fas fa-shopping-bag color-red"></i> <span class="hidden ml-05">{{ __('models.variable') }}</span></a>
                            </li>
                            <li>
                                <a href="/recurrings" {!! (Request::path() == 'recurrings') ? 'class="active"' : '' !!}><i class="fa fa-undo fa-sm color-blue"></i> <span class="hidden ml-05">{{ __('models.recurrings') }}</span></a>
                            </li>
                            <li>
                                <a href="/investments" {!! (Request::path() == 'investments') ? 'class="active"' : '' !!}><i class="fas fa-piggy-bank color-green"></i> <span class="hidden ml-05">{{ 'Investimentos' }}</span></a>
                            </li>
                            <li>
                                <a href="/budget" {!! (Request::path() == 'budget') ? 'class="active"' : '' !!}><i class="fas fa-plane color-blue"></i> <span class="hidden ml-05">{{ __('models.budget') }}</span></a>
                            </li>
                            <?php /* <li>
                                <a href="/reports" {!! (Request::path() == 'reports') ? 'class="active"' : '' !!}><i class="far fa-chart-line fa-sm color-blue"></i> <span class="hidden ml-05">{{ __('models.reports') }}</span></a>
                            </li> */ ?>
                            <li>
                                <dropdown>
                                    <span slot="button">
                                        <i class="fab fa-nintendo-switch color-black mr-05"></i> <i class="fas fa-caret-down fa-sm"></i>
                                    </span>
                                    <ul slot="menu" v-cloak>
                                        <li>
                                            <a href="/earnings/create">{{ __('actions.create') }} {{ __('models.earning') }}</a>
                                        </li>
                                        <li>
                                            <a href="/spendings/create">{{ __('actions.create') }} {{ __('models.spending') }}</a>
                                        </li>
                                    </ul>
                                </dropdown>
                            </li>
                            @if (Auth::user()->spaces->count() > 1)
                                <li>
                                    <dropdown>
                                        <span slot="button">
                                            {{ str_limit(session('space')->name, 3) }} <i class="fas fa-caret-down fa-sm"></i>
                                        </span>
                                        <ul slot="menu" v-cloak>
                                            @foreach (Auth::user()->spaces as $space)
                                                <li>
                                                    <a href="/spaces/{{ $space->id }}">{{ $space->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </dropdown>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            @endif
            @yield('body')
            @if (auth()->check())
                <div class="text-center mb-3">
                    <a href="/ideas/create" style="font-size: 14px;">{{ __('general.new_idea') }}</a>
                </div>
            @endif
        </div>
        <script src="/js/app.js"></script>
        @yield('scripts')
    </body>
</html>
