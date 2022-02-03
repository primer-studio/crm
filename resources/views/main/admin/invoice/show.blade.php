<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>صورتحساب</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: middle;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .right tr td {
            text-align: right !important;
        }
    </style>
</head>

<body>
<div class="invoice-box rtl">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{ asset('assets/statics/primer-studio-mini.png') }}" style="width: 30%;" />
                        </td>

                        <td>
                            صورتحساب: {{ $invoice->number }}<br />
                            تاریخ: {{ $invoice->created_at }}<br />
                            سر رسید: {{ $invoice->expires_at }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <p style="font-weight: bold">مشخصات فروشنده</p>
                            <p>استودیو پرایمر</p>
                            <p>میدان بنی‌هاشم کوچه نمازی - پلاک ۱ واحد ۱</p>

                            <hr>

                            <table>
                                <tr>
                                    <td>
                                        <p style="font-weight: bold">مشخصات خریدار</p>
                                        <p>نام: {{ $invoice->user->name }} - کد پستی: {{ $invoice->user->postal_code }}</p>
                                        <p>آدرس: {{ $invoice->user->address }}</p>
                                        <p>تلفن: {{ $invoice->user->number }}</p>
                                        <p>شماره ثبت: {{ $invoice->user->register_number }} - کد اقتصادی: {{ $invoice->user->economical_number }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            <img src="{{ $invoice->user->avatar }}" alt="">
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <hr>

    <table class="right">
        <tr class="heading">
            <td>عنوان</td>
            <td>مبلغ</td>
            <td>تخفیف</td>
            <td>مبلغ نهایی</td>
        </tr>

        @foreach (json_decode($invoice->items)->items as $item )
        <tr class="item">
            <td><p style="font-weight: bold; color: black;">{{ $item->title }}<br><span style="font-weight: 200; color: gray; font-size: 12px">{{ $item->info }}</span></p></td>
            <td>{{ number_format($item->price) }} ﷼</td>
            <td>{{ $item->discount }}%</td>
            <td>{{ number_format($item->price-(($item->discount*$item->price)/100)) }} ﷼</td>
        </tr>
        @endforeach
    </table>
    <div style="text-align: left">
        <p><span style="font-weight: bold">قابل پرداخت:</span> {{ number_format($invoice->payable) }} ﷼</p>
    </div>
</div>
</body>
</html>
