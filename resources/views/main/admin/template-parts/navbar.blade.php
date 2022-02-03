<nav class="uk-navbar-container uk-padding uk-padding-remove-top uk-padding-remove-bottom" uk-navbar>

    <div class="uk-navbar-right">
        <a class="uk-navbar-item uk-logo" href="#">
            <img src="{{ asset('assets/statics/primer-studio-mini.png') }}" style="max-width: 60px;">
        </a>
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="{{ route('Admin > Dashboard') }}">صفحه اصلی</a></li>
            <li><a href="{{ route('Admin > Departments > Manage') }}">دپارتمان‌ها</a></li>
{{--            <li><a href="#">کارمندان</a></li>--}}
            <li><a href="{{ route('Admin > Customers > Manage') }}">مشتریان</a></li>
            <li><a href="{{ route('Admin > Services > Manage') }}">سرویس‌ها</a></li>
            <li><a href="{{ route('Admin > Threads > Manage') }}">تیکت‌ها</a></li>
            {{--
            <li>
                <a href="#">Parent</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">صفحه اصلی</a></li>
                        <li><a href="#">تیکت‌ها</a></li>
                        <li><a href="#">فاکتورها</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">Item</a></li>
            --}}
        </ul>

    </div>

    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">
            <span uk-icon="icon: lock"></span>
        </a>
    </div>

</nav>
