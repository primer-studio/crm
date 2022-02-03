<nav class="uk-navbar-container uk-padding uk-padding-remove-top uk-padding-remove-bottom" uk-navbar>

    <div class="uk-navbar-right">
        <a class="uk-navbar-item uk-logo" href="#">
            <img src="{{ asset('assets/statics/primer-studio-mini.png') }}" style="max-width: 60px;">
        </a>
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="#">صفحه اصلی</a></li>
            <li><a href="{{ route('Customer > Services') }}">سرویس‌ها</a></li>
            <li><a href="{{ route('Customer > Threads > Manage') }}">تیکت‌ها</a></li>
            <li><a href="{{ route('Customer > Invoices > Manage') }}">فاکتورها</a></li>
        </ul>

    </div>

    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">
            <a href="#"><img class="uk-border-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=7F9CF5&background=EBF4FF&length=1" alt=""></a>
            <div class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li class="uk-active"><a href="#">خروج</a></li>
                </ul>
            </div>
        </a>
    </div>

</nav>
