<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
    <div class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">ایجاد مشتری</h3>
        @if(isset($message) && !is_null($message))
            <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $message }}</p>
            </div>
        @endif
        <form class="uk-form-stacked uk-grid" wire:submit.prevent="submit" uk-grid>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="name">نام مشتری</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="name" id="name" name="name" type="text" placeholder="" value="{{ old('name') }}">
                    </div>
                    @error('name') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="agent_name">نام نماینده</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="agent_name" id="agent_name" name="agent_name" type="text" placeholder="" value="{{ old('agent_name') }}">
                    </div>
                    @error('agent_name') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="status">وضعیت</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="status" id="status" name="status">
                            <option></option>
                            <option value="active">فعال</option>
                            <option value="deactive">غیر فعال</option>
                        </select>
                    </div>
                    @error('status') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="email">ایمیل</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="email" id="email" name="email" type="email" placeholder="" value="{{ old('email') }}">
                    </div>
                    @error('email') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="number">شماره تلفن</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="number" id="number" name="number" type="text" placeholder="" value="{{ old('number') }}">
                    </div>
                    @error('number') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="number">آواتار</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="avatar" id="avatar" name="avatar" type="text" placeholder="" value="{{ old('avatar') }}">
                    </div>
                    @error('avatar') <p class="uk-text-danger">{{ $message }}</p> @enderror
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
        <h3 class="uk-card-title">مشتریان سامانه</h3>
        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
            <tr>
                <th>نام</th>
                <th>نام نماینده</th>
                <th>وضعیت</th>
                <th>تیکت‌ها</th>
                <th>ایمیل</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr id="row-{{ $customer->id }}">
                    <td @if($customer->trashed()) style="color: lightcoral;" @endif>{{ $customer->name }}</td>
                    <td>{{ $customer->agent_name }}</td>
                    <td>{{ $customer->status }}</td>
                    <td>{{ count($customer->thread) }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <span class="model-actions uk-label uk-label-{{ ($customer->trashed()) ? "warning" : "danger" }} uk-border-rounded"
                        wire:click="{{ ($customer->trashed()) ? "restore($customer->id)" : "delete({$customer->id})" }}">{{ ($customer->trashed()) ? "بازیابی" : "حذف" }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
