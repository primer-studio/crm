<div class="uk-container">
    @include('livewire.repeaters.overlay')
    @include('livewire.repeaters.offline')
    <div class="uk-animation-slide-top-small uk-card uk-card-default uk-card-body  uk-light uk-border-rounded uk-margin-bottom">
        <h3 class="uk-card-title">تیکت: {{ $thread->title }}
        @if($thread->status == 'open')
            <span class="uk-label uk-label-danger uk-float-left">باز</span>
            <span class="uk-label uk-label-danger uk-float-left uk-margin-left cursor-pointer" wire:click="close">بستن تیکت</span>     
        @elseif($thread->status == 'pending')
            <span class="uk-label uk-label-warning uk-float-left">در حال بررسی</span>
            <span class="uk-label uk-label-danger uk-float-left uk-margin-left cursor-pointer" wire:click="close">بستن تیکت</span>     
        @elseif($thread->status == 'responded')
            <span class="uk-label uk-float-left" style="background: #44bd32; color: white">پاسخ داده شده</span>
            <span class="uk-label uk-label-danger uk-float-left uk-margin-left cursor-pointer" wire:click="close">بستن تیکت</span>     
        @elseif($thread->status == 'customer_responded')
            <span class="uk-label uk-float-left" style="background: #fbc531; color: white">پاسخ مشتری</span>
            <span class="uk-label uk-label-danger uk-float-left uk-margin-left cursor-pointer" wire:click="close">بستن تیکت</span>     
        @else
            <span class="uk-label uk-float-left">بسته شده</span>
            <span class="uk-label uk-label-success uk-float-left uk-margin-left cursor-pointer" wire:click="open">باز کردن</span>
        @endif
        </h3>
        @if(isset($message) && !is_null($message))
            <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $message }}</p>
            </div>
        @endif
        <hr>
        <div class="@if($thread->user->id == Auth::id()) uk-card-secondary @else uk-card-primary @endif uk-card-body uk-border-rounded">
            <h3 class="uk-card-title">{{ $thread->user->name }}</h3>
            <span class="uk-text-meta">{{ $thread->created_at }}</span>
            <p>{{ $thread->content }}</p>
        </div>
        @if(!count($tickets))
            <p class="uk-text-muted"><span uk-icon="warning"></span> پاسخی برای این تیکت ارسال نشده است. لطفا پاسخی ارسال کنید.</p>
        @endif
        @foreach($tickets as $ticket)
            <div class="@if($ticket->user->id == Auth::id()) uk-card-secondary @else uk-card-primary @endif uk-card-body uk-border-rounded uk-margin">
                <h3 class="uk-card-title">
                    @if($ticket->user->rule == 'admin')
                        <img src="/assets/statics/primer-studio-mini.png" style="max-width: 35px;">
                    @endif
                    {{ $ticket->user->name }}
                </h3>
                <span class="uk-text-meta">{{ $ticket->created_at }}</span>
                <p>{{ $ticket->content }}</p>
            </div>
        @endforeach
        <hr>
        <h4>ارسال پاسخ</h4>
        <form class="uk-form-stacked uk-grid" wire:submit.prevent="submit" uk-grid>

            <div class="uk-width-1-1@m">
                <div class="uk-margin">
                    <label class="uk-form-label" for="content">محتوا</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" wire:model="content" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                    </div>
                    @error('content') <p class="uk-text-danger">{{ $message }}</p> @enderror
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
</div>
