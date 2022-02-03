<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
    <div class="uk-animation-slide-right-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">فاکتورها</h3>

        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
            <tr>
                <th>شماره</th>
                <th>سررسید</th>
                <th>کاربر</th>
                <th>قابل پرداخت</th>
                <th>تخفیف</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr id="row-{{ $invoice->id }}">
                    <td>{{ $invoice->number }}</td>
                    <td>{{ $invoice->expires_at }}</td>
                    <td>{{ $invoice->user->name }}</td>
                    <td>{{ number_format($invoice->payable) }} ﷼ </td>
                    <td>{{ number_format($invoice->discount) }} ﷼ </td>
                    <td>
                        @if($invoice->payment_status == 'unpaid')
                            <span class="uk-label uk-label-warning">پرداخت نشده</span>
                        @elseif($invoice->payment_status == 'paid')
                            <span class="uk-label uk-label-success">پرداخت شده</span>
                        @else
                            <span class="uk-label uk-label-danger">نامشخص</span>
                        @endif
                    </td>
                    <td><a href="{{ route('Customer > Invoices > Show', $invoice->hash) }}">نمایش</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
