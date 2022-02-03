<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
{{--    <div--}}
{{--        class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">--}}
{{--        <h3 class="uk-card-title">سرویس‌ها</h3>--}}
{{--        @if(isset($message) && !is_null($message))--}}
{{--            <div class="uk-alert-primary" uk-alert>--}}
{{--                <a class="uk-alert-close" uk-close></a>--}}
{{--                <p>{{ $message }}</p>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--                <form class="uk-form-stacked uk-grid" wire:submit.prevent="submit" uk-grid>--}}

{{--                    <div class="uk-width-3-4@m">--}}
{{--                        <div class="uk-margin">--}}
{{--                            <label class="uk-form-label" for="title">عنوان</label>--}}
{{--                            <div class="uk-form-controls">--}}
{{--                                <input class="uk-input" wire:model="title" id="title" name="title" type="text" placeholder="" value="{{ old('title') }}">--}}
{{--                            </div>--}}
{{--                            @error('title') <p class="uk-text-danger">{{ $message }}</p> @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="uk-width-1-2@m">--}}
{{--                        <div class="uk-margin">--}}
{{--                            <label class="uk-form-label" for="user_id">انتخاب کاربر</label>--}}
{{--                            <div class="uk-form-controls">--}}
{{--                                <select class="uk-select" wire:model="user_id" id="user_id" name="user_id">--}}
{{--                                    <option></option>--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @error('user_id') <p class="uk-text-danger">{{ $message }}</p> @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="uk-width-1-3@m">--}}
{{--                        <div class="uk-margin">--}}
{{--                            <label class="uk-form-label" for="status">وضعیت</label>--}}
{{--                            <div class="uk-form-controls">--}}
{{--                                <select class="uk-select" wire:model="status" id="status" name="status">--}}
{{--                                    <option></option>--}}
{{--                                    <option value="open">باز</option>--}}
{{--                                    <option value="closed">بسته</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @error('status') <p class="uk-text-danger">{{ $message }}</p> @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="uk-width-1-4@m">--}}
{{--                        <div class="uk-margin">--}}
{{--                            <label class="uk-form-label" for="department_id">دپارتمان</label>--}}
{{--                            <div class="uk-form-controls">--}}
{{--                                <select class="uk-select" wire:model="department_id" id="department_id" name="department_id">--}}
{{--                                    <option></option>--}}
{{--                                    @foreach($departments as $department)--}}
{{--                                        <option value="{{ $department->id }}">{{ $department->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @error('department_id') <p class="uk-text-danger">{{ $message }}</p> @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="uk-width-1-2@m">--}}
{{--                        <div class="uk-margin">--}}
{{--                            <label class="uk-form-label" for="service_id">سرویس</label>--}}
{{--                            <div class="uk-form-controls">--}}
{{--                                <select class="uk-select" wire:model="service_id" id="service_id" name="service_id">--}}
{{--                                    <option></option>--}}
{{--                                    @foreach($services as $service)--}}
{{--                                        <option value="{{ $service->id }}">{{ $service->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @error('service_id') <p class="uk-text-danger">{{ $message }}</p> @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="uk-width-1-2@m">--}}
{{--                        <div class="uk-margin">--}}
{{--                            <label class="uk-form-label" for="content">محتوا</label>--}}
{{--                            <div class="uk-form-controls">--}}
{{--                                <textarea class="uk-textarea" wire:model="content" id="content" name="content" rows="5">{{ old('content') }}</textarea>--}}
{{--                            </div>--}}
{{--                            @error('content') <p class="uk-text-danger">{{ $message }}</p> @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="uk-width-1-1">--}}
{{--                        <div class="uk-margin uk-text-center">--}}
{{--                            <button type="submit" class="uk-button uk-button-primary uk-margin-left">ثبت</button>--}}
{{--                            <button type="reset" class="uk-button uk-button-muted">حذف</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--    </div>--}}

    <div
        class="uk-animation-slide-right-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <div class="uk-alert-warning" uk-alert>
            <p><span uk-icon="icon: warning" class="uk-margin-small-left"></span> کاربر گرامی، شما دسترسی ایجاد سرویس ندارید.</p>
        </div>
        <h3 class="uk-card-title">سرویس‌ها</h3>
        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
            <tr>
                <th>عنوان</th>
                {{--                <th>ایجنت</th>--}}
                <th>نماینده</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr id="row-{{ $service->id }}">
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->agent_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
