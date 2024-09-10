<div>
    <div class="font-bold text-2xl mb-4">{{ __('messages.Login by email or RFID card') }}</div>

    <form wire:submit.prevent="login">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">{{ __('messages.E-mail:') }}</label>
            <input
                class="w-full bg-gray-100 py-4 px-3 border-b-2 border-cyan-400 focus:outline-none focus:border-cyan-600"
                type="email"
                id="email"
                placeholder="admin@admin.com ({{ __('messages.for_test') }})"
                wire:model="email"
                required>
        </div>
        <div class="flex justify-end">
            <button class="bg-cyan-600 hover:bg-cyan-700 text-white py-6 px-12" type="submit">{{ __('messages.Login') }}</button>
        </div>
    </form>
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
</div>
