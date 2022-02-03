<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
    <div class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">ایجاد فاکتور</h3>
        @if(isset($message) && !is_null($message))
            <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $message }}</p>
            </div>
        @endif
        <form class="uk-form-stacked uk-grid" wire:submit.prevent="submit" uk-grid>
            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="user_id">انتخاب کاربر</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="user_id" wire:change="filter_services" id="user_id" name="user_id">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="service_id">انتخاب سرویس</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="service_id" id="service_id" name="service_id">
                            <option></option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('service_id') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="payment_status">وضعیت</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="payment_status" id="payment_status" name="payment_status">
                            <option></option>
                            <option value="unpaid">پرداخت نشده</option>
                            <option value="paid">پرداخت شده</option>
                        </select>
                    </div>
                    @error('payment_status') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="payment_info">توضیحات پرداخت</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" wire:model="payment_info" id="payment_info" name="payment_info" rows="5">{{ old('payment_info') }}</textarea>
                    </div>
                    @error('payment_info') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="items">آیتم‌های فاکتور</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea uk-text-left uk-align-left" wire:model="items" id="items" name="items" rows="5">{{ old('items') }}</textarea>
                    </div>
                    <p class="uk-text-left uk-text-meta uk-text-danger">use <a href="https://json-generator.com/" target="_blank">json generator</a></p>
                    @error('items') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-1">
                <div class="uk-margin uk-text-center">
                    <button type="submit" class="uk-button uk-button-primary uk-margin-left">ثبت</button>
                    <button type="reset" class="uk-button uk-button-muted">حذف</button>
                </div>
            </div>

        </form>
    </div>
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
                    <td><a href="{{ route('Admin > Invoices > Show', $invoice->hash) }}">نمایش</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
