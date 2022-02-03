<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
    <div class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">ایجاد تیکت</h3>
        @if(isset($message) && !is_null($message))
            <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $message }}</p>
            </div>
        @endif
        <form class="uk-form-stacked uk-grid" wire:submit.prevent="submit" uk-grid>

            <div class="uk-width-1-2@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="title">عنوان</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" wire:model="title" id="title" name="title" type="text" placeholder="" value="{{ old('title') }}">
                    </div>
                    @error('title') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-2@m">
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
                    <label class="uk-form-label" for="status">وضعیت</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="status" id="status" name="status">
                            <option></option>
                            <option value="open">باز</option>
                            <option value="responded">پاسخ داده شده</option>
                            <option value="customer_responded">پاسخ مشتری</option>
                            <option value="pending">در حال بررسی</option>
                            <option value="closed">بسته</option>
                        </select>
                    </div>
                    @error('status') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="department_id">دپارتمان</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" wire:model="department_id" id="department_id" name="department_id">
                            <option></option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('department_id') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-3@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="service_id">سرویس</label>
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

            <div class="uk-width-1-1@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="content">محتوا</label>
                    <div class="uk-form-controls">
                        <!-- <div id="content_test"></div> -->
                        <textarea class="uk-textarea" wire:model="content" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                        <!-- <script>
                                BalloonEditor
                                        .create( document.querySelector( '#content_test' ) )
                                            .catch( error => {
                                                console.error( error );
                                            }
                                        );
                        </script> -->
                    </div>

                    @error('content') <p class="uk-text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="uk-width-1-1@m">
                <div class="uk-margin">
                    <div class="js-upload uk-placeholder uk-text-center uk-border-rounded">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">فایل‌های ضمیمه را به این بخش بکشید</span>
                        <div uk-form-custom>
                            <input type="file" multiple>
                            <span class="uk-link"> و یا انتخاب کنید.</span>
                        </div>
                    </div>
                    {{--                    <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>--}}

                    {{--                    <script>--}}

                    {{--                        var bar = document.getElementById('js-progressbar');--}}

                    {{--                        UIkit.upload('.js-upload', {--}}

                    {{--                            url: '',--}}
                    {{--                            multiple: true,--}}

                    {{--                            beforeSend: function () {--}}
                    {{--                                console.log('beforeSend', arguments);--}}
                    {{--                            },--}}
                    {{--                            beforeAll: function () {--}}
                    {{--                                console.log('beforeAll', arguments);--}}
                    {{--                            },--}}
                    {{--                            load: function () {--}}
                    {{--                                console.log('load', arguments);--}}
                    {{--                            },--}}
                    {{--                            error: function () {--}}
                    {{--                                console.log('error', arguments);--}}
                    {{--                            },--}}
                    {{--                            complete: function () {--}}
                    {{--                                console.log('complete', arguments);--}}
                    {{--                            },--}}

                    {{--                            loadStart: function (e) {--}}
                    {{--                                console.log('loadStart', arguments);--}}

                    {{--                                bar.removeAttribute('hidden');--}}
                    {{--                                bar.max = e.total;--}}
                    {{--                                bar.value = e.loaded;--}}
                    {{--                            },--}}

                    {{--                            progress: function (e) {--}}
                    {{--                                console.log('progress', arguments);--}}

                    {{--                                bar.max = e.total;--}}
                    {{--                                bar.value = e.loaded;--}}
                    {{--                            },--}}

                    {{--                            loadEnd: function (e) {--}}
                    {{--                                console.log('loadEnd', arguments);--}}

                    {{--                                bar.max = e.total;--}}
                    {{--                                bar.value = e.loaded;--}}
                    {{--                            },--}}

                    {{--                            completeAll: function () {--}}
                    {{--                                console.log('completeAll', arguments);--}}

                    {{--                                setTimeout(function () {--}}
                    {{--                                    bar.setAttribute('hidden', 'hidden');--}}
                    {{--                                }, 1000);--}}

                    {{--                                alert('Upload Completed');--}}
                    {{--                            }--}}

                    {{--                        });--}}

                    {{--                    </script>--}}
                    @error('attachment') <p class="uk-text-danger">{{ $message }}</p> @enderror
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
        <h3 class="uk-card-title">تیکت‌ها</h3>
        <p>
            <span class="uk-text-meta cursor-pointer uk-margin-left" wire:click="update_threads('status')" type="button">همه</span>
            <span class="uk-text-meta cursor-pointer uk-margin-left" wire:click="update_threads('status', 'open')" type="button">باز</span>
            <span class="uk-text-meta cursor-pointer uk-margin-left" wire:click="update_threads('status', 'closed')" type="button">بسته شده</span>
            <span class="uk-text-meta cursor-pointer uk-margin-left" wire:click="update_threads('status', 'customer_responded')" type="button">پاسخ مشتری</span>
            <span class="uk-text-meta cursor-pointer uk-margin-left" wire:click="update_threads('status', 'responded')" type="button">پاسخ داده شده</span>
        </p>
        <table class="uk-table uk-table-hover uk-table-divider">
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
</div>
