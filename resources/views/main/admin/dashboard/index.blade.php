@extends('main.admin.template')

@section('content')
    <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
        <div>
            <div class="uk-animation-slide-top-small uk-card uk-card-secondary uk-card-body uk-card-hover uk-border-rounded">
                <h3 class="uk-card-title"><span uk-icon="thumbnails"></span> دپارتمان‌ها</h3>
                <p>تعریف دپارتمان‌های سیستم</p>
            </div>
        </div>
        <div>
            <div class="uk-animation-slide-top-small uk-card uk-card-primary uk-card-body uk-card-hover uk-border-rounded">
                <h3 class="uk-card-title"><span uk-icon="users"></span> مشتریان</h3>
                <p>مدیریت مشتریان سیستم</p>
            </div>
        </div>
        <div>
            <div class="uk-animation-slide-top-small uk-card uk-card-secondary uk-card-body uk-card-hover uk-border-rounded">
                <h3 class="uk-card-title"><span uk-icon="credit-card"></span> فاکتورها</h3>
                <p>ثبت و پیگیری فاکتورهای مالی</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">آخرین تیکت‌ها</h3>
        <hr>
        <table class="uk-table uk-table-hover uk-table-divider">
            {{--<caption></caption>--}}
            <thead>
            <tr>
                <th>عنوان</th>
                {{--                <th>ایجنت</th>--}}
                <th>دپارتمان</th>
                <th>کاربر</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>عنوان</th>
                {{--                <th>ایجنت</th>--}}
                <th>دپارتمان</th>
                <th>کاربر</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($threads as $thread)
                <tr id="row-{{ $thread->id }}">
                    <td>{{ $thread->title }}</td>
                    <td>{{ $thread->department->name }}</td>
                    <td>{{ $thread->user->name }}</td>
                    {{--                    <td>{{ $thread->user->name }}</td>--}}
                    <td>
                        @if($thread->status == 'open')
                            <span class="uk-label uk-label-danger">باز</span>
                        @elseif($thread->status == 'pending')
                            <span class="uk-label uk-label-warning">در حال بررسی</span>
                        @elseif($thread->status == 'responded')
                            <span class="uk-label" style="background: #44bd32; color: white">پاسخ داده شده</span>
                        @elseif($thread->status == 'customer_responded')
                            <span class="uk-label" style="background: #fbc531; color: white">پاسخ مشتری</span>
                        @else
                            <span class="uk-label">بسته شده</span>
                        @endif
                    </td>
                    <td><a href="{{ route('Admin > Threads > Show', $thread->id) }}">نمایش</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <div class="uk-width-1-1 uk-animation-fade uk-card uk-card-default uk-card-body uk-border-rounded">
        <h3 class="uk-card-title">فاکتورهای پرداخت نشده</h3>
        <hr>
        <table class="uk-table">
            {{--<caption></caption>--}}
            <thead>
            <tr class="uk-animation-slide-top-small">
                <th>شناسه</th>
                <th>تاریخ ایجاد</th>
                <th>تاریخ سررسید</th>
                <th>سرویس</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
            @foreach($invoices as $invoice)
                <tr id="row-{{ $invoice->id }}">
                    <td>{{ $invoice->number }}</td>
                    <td>{{ explode(' ', $invoice->created_at)[0] }}</td>
                    <td>{{ $invoice->expires_at }}</td>
                    <td>{{ $invoice->service->name }}</td>
                    <td>
                        @if($invoice->payment_status == 'paid')
                            <span class="uk-label uk-label-muted">پرداخت شده</span>
                        @elseif($invoice->payment_status == 'unpaid')
                            <span class="uk-label uk-label-warning">پرداخت نشده</span>
                        @else
                            <span class="uk-label uk-label-danger">نا مشخص</span>
                        @endif
                    </td>
                    <td><a href="{{ route('Admin > Invoices > Show', $invoice->hash) }}">نمایش</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
