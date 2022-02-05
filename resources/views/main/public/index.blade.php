@extends('main.public.template')

@section('content')
<div class="uk-section uk-section-primary"
     style="
        background: url(https://getuikit.com//images/section-background.svg) 50% 17vh no-repeat,linear-gradient(to left top,#28a5f5,#063f77) 0 0 no-repeat;
        height: 98vh;
        margin: 0;
">
    <div class="uk-container uk-text-center" style="margin-top: 15% !important;">
        <img src="{{ asset('assets/statics/primer-studio-mini.png') }}" alt="">
        <p class="uk-text-lead uk-text-bold">استودیو پرایمر</p>
        <button class="uk-button uk-button-default" type="button"><a href="{{ route('Auto Redirect To Panel') }}" class="uk-link uk-link-reset">ورود به سامانه مشتیان</a></button>
    </div>
</div>
@endsection
