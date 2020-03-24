<ul  id='dropdown-locale' class='dropdown-content'>
    <li><a href="/locale/pt-br">Português</a></li>
    <li class="divider"></li>
    <li><a href="/locale/en">English</a></li>
</ul>

@if (\Auth::user())
<ul id="dropdown-user" class="dropdown-content">
    <li><a href="/profile">{{ __('lang33') }}</a></li>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('lang32') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
@endif


<div class="parallax-container">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="/" class="brand-logo">Forum</a>

                <ul class="right">
                    <li>
                        <a class='dropdown-trigger' href='#!' data-target='dropdown-locale'>{{ __('lang5') }}<i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    @if (\Auth::user())
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown-user">{{ \Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    @else
                    <li>
                        <a href="/login">{{ __('lang15') }}</a>
                    </li>
                    <li>
                        <a href="/register">{{ __('lang16') }}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="parallax">
        <img src="/img/help.jpg" alt="">
    </div>
</div>
