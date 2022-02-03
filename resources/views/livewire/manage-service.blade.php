<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
    <div class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">ایجاد سرویس</h3>
        @if(isset($message) && !is_null($message))
            <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $message }}</p>
            </div>
        @endif
        <form class="uk-form-stacked uk-grid" wire:submit.prevent="submit" uk-grid>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="name">نام سرویس</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="name" id="name" name="name" type="text" placeholder="" value="{{ old('name') }}">
                    </div>
                    @error('name') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="agent_name">نام نماینده</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="agent_name" id="agent_name" name="agent_name" type="text" placeholder="" value="{{ old('agent_name') }}">
                    </div>
                    @error('agent_name') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="user_id">انتساب کاربر</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="user_id" id="user_id" name="user_id">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id') <p class="uk-text-danger">{{ $message }}</p> @enderror
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
        <h3 class="uk-card-title">دپارتمان‌های سامانه</h3>
        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
            <tr>
                <th>نام</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td @if($service->trashed()) style="color: lightcoral;" @endif>{{ $service->name }}</td>
                    <td>{{ $service->status }}</td>
                    <td>
                        <span class="model-actions uk-label uk-label-{{ ($service->trashed()) ? "warning" : "danger" }} uk-border-rounded"
                              wire:click="{{ ($service->trashed()) ? "restore($service->id)" : "delete({$service->id})" }}">{{ ($service->trashed()) ? "بازیابی" : "حذف" }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
