<header class="flex justify-between items-center">
    <div class="logo flex justify-between items-center">
        <img src="images/logo.png" alt="Logo" class="h-32">
        <div>
            <div class="text-xl font-medium">{{ __('messages.Timebookings') }}</div>
            <div class="text-gray-400 text-sm"> {{ __('messages.Bookings history for the last seven days') }}</div>
        </div>
    </div>

    <div class="language-switcher">
        @livewire('language-switcher')
    </div>
</header>
