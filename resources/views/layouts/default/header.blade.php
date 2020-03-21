<div class="parallax-container">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="/" class="brand-logo">Forum</a>

                <ul class="right">
                    <li>
                        <a class='dropdown-trigger' href='#' data-target='dropdown-locale'>{{ __('lang5') }}<i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    @if (\Auth::user())
                    <li>
                        <a href="#!" data-activates="user" class="dropdown-button">{{ \Auth::user()->name }}</a>
                    </li>
                    @else
                    <li>
                        <a href="/login">{{ __('Login') }}</a>
                    </li>
                    <li>
                        <a href="/register">{{ __('Sign Up') }}</a>
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

<ul  id='dropdown-locale' class='dropdown-content'>
    <li><a href="/locale/pt-br">Português</a></li>
    <li class="divider"></li>
    <li><a href="/locale/en">English</a></li>
</ul>