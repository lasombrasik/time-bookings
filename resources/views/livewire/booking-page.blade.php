<div class="flex justify-between rounded-full mx-8">
    <div class="w-1/2 text-left">
        <livewire:booking-list :user="$user" />
    </div>
    <div class="w-1/2">
        <livewire:booking-panel :user="$user" />
    </div>
</div>
