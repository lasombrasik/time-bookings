<div>
    @if (session()->has('message'))
        <div x-data="{ visible: true }"
             x-init="setTimeout(() => visible = false, 2000)"
             x-show="visible"
             class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
             role="alert">
            <strong>{!! session('message') !!}</strong>
        </div>
    @endif
    @if (session()->has('info'))
        <div x-data="{ visible: true }"
             x-init="setTimeout(() => visible = false, 2000)"
             x-show="visible"
             class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
             role="alert">
            <strong>{!! session('info') !!}</strong>
        </div>
    @endif
    <img src="{{ asset('images/employee.png') }}" class="rounded-full w-24 h-24 mx-auto" alt="Default User Photo">

    <div class="text-center font-bold pt-2">
        {{ $user->employee->firstname . ' ' . $user->employee->lastname }}
    </div>

    <div class="flex items-center justify-between border-b border-gray-200 w-full mx-auto pb-4 mt-8">
        <div class="w-1/2 text-cyan-600">{{ __('messages.Today / Week') }}</div>
        <div class="w-1/2">{{ __('messages.N/A') }}</div>
    </div>

    <div class="flex items-center justify-between border-b border-gray-200 w-full pb-4 mt-4 mb-8">
        <div class="w-1/2 text-cyan-600">{{ __('messages.Balance') }}</div>
        <div class="w-1/2">{{ $unworkedTime }}</div>
    </div>

    <div class="flex">
        <button class="bg-cyan-600 hover:bg-cyan-700 text-white py-6 w-2/3 mr-2 disabled:bg-gray-400 disabled:cursor-not-allowed" wire:click="bookTime" @if($isDisabled) disabled @endif>{{ __('messages.book') }}</button>
        <button class="bg-white hover:bg-cyan-700 text-cyan-600  hover:text-white border border-cyan-600 py-6 w-full" wire:click="signOut">{{ __('messages.Sing out in 3 sec.') }}</button>
    </div>
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('logoutAfterDelay', () => {
            setTimeout(() => {
                window.location.href = '/logout';
            }, 3000);
        });
    });
</script>
