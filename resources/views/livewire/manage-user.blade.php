<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
    <div class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">مدیریت کاربران سامانه</h3>
        @if(isset($message) && !is_null($message))
            <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $message }}</p>
            </div>
        @endif
        <form class="uk-form-stacked uk-grid" wire:submit.prevent="submit" uk-grid>

            <div class="uk-width-1-4@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="name">نام کاربر</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="name" id="name" name="name" type="text"  autocomplete="off" value="{{ old('name') }}">
                    </div>
                    @error('name') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-4@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="rule">سطح کاربری</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="rule" id="rule" name="rule">
                            <option></option>
                            <option value="customer">مشتری</option>
                            <option value="admin">مدیر</option>
                        </select>
                    </div>
                    @error('rule') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-4@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="department">دپارتمان</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="department" id="department" name="department">
                            <option></option>
                            @foreach($departments as $department)
                                @if($department->status == 'active')
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('department') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-4@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="status">وضعیت</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="status" id="status" name="status" placeholder="">
                            <option></option>
                            <option value="active">فعال</option>
                            <option value="deactive">غیر فعال</option>
                        </select>
                    </div>
                    @error('status') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="avatar">آواتار</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="avatar" id="avatar" name="avatar" type="text" placeholder="" value="{{ old('avatar') }}">
                    </div>
                    @error('avatar') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="email">ایمیل</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="email" id="email" name="email" type="email" placeholder="" value="{{ old('email') }}">
                    </div>
                    @error('email') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="number">شماره تلفن</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="number" id="number" name="number" type="text" placeholder="" value="{{ old('number') }}">
                    </div>
                    @error('number') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="postal_code">کد پستی</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="postal_code" id="postal_code" name="postal_code" type="text" autocomplete="off" placeholder="" value="{{ old('postal_code') }}">
                    </div>
                    @error('postal_code') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="economical_code">کد اقتصادی</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="economical_number" id="economical_number" name="economical_number" type="text" autocomplete="off" placeholder="" value="{{ old('economical_number') }}">
                    </div>
                    @error('economical_number') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="register_number">شماره ثبت</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="register_number" id="register_number" name="register_number" type="text" autocomplete="off" placeholder="" value="{{ old('register_number') }}">
                    </div>
                    @error('register_number') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="address">آدرس</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="address" id="address" name="address" type="text" autocomplete="off" placeholder="" value="{{ old('address') }}">
                    </div>
                    @error('address') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">رمز عبور</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="password" id="password" name="password" type="password" autocomplete="off" placeholder="" value="{{ old('password') }}">
                    </div>
                    @error('password') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">تکرار رمز عبور</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="password" id="password" name="password" type="password" autocomplete="off" placeholder="" value="{{ old('password') }}">
                    </div>
                    @error('password') <p class="uk-text-danger">{{ $message }}</p> @enderror
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
{{--                <th>نام نماینده</th>--}}
                <th>وضعیت</th>
                <th>تیکت‌ها</th>
                <th>ایمیل</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr id="row-{{ $user->id }}">
                    <td @if($user->trashed()) style="color: lightcoral;" @endif>{{ $user->name }}</td>
{{--                    <td>{{ $user->agent_name }}</td>--}}
                    <td>{{ $user->status }}</td>
                    <td>{{ count($user->thread) }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="model-actions uk-label uk-label-{{ ($user->trashed()) ? "warning" : "danger" }} uk-border-rounded"
                        wire:click="{{ ($user->trashed()) ? "restore($user->id)" : "delete({$user->id})" }}">{{ ($user->trashed()) ? "بازیابی" : "حذف" }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
