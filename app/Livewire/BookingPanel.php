<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Attendance;

class BookingPanel extends Component
{
    public $user;
    public $title = '';
    public $isDisabled = false;
    public $unworkedTime = '';

    public function mount($user)
    {
        $this->user = $user;
        $this->unworkedTime = $this->getHoursWorkedThisWeek();
        $this->isDisabled = session()->get('isDisabled', false);
    }

    public function bookTime()
    {
        Attendance::query()
            ->create([
            'employee_id' => $this->user->employee->id,
            'in_time' => Carbon::now()
        ]);

        $this->isDisabled = true;

        session()->put('isDisabled', true);
        session()->flash('message', __('messages.entry_added_successfully'));

        $this->dispatch('attendanceAdded');
    }

    public function signOut()
    {
        Attendance::query()
            ->where('employee_id', $this->user->employee->id)
            ->whereNull('out_time')
            ->update(['out_time' => Carbon::now()]);

        session()->flash('info', __('messages.entry_added_successfully') .'<br>'. __('messages.session_ended_goodbye'));

        $this->dispatch('attendanceAdded');
        $this->dispatch('logoutAfterDelay');
    }

    public function getHoursWorkedThisWeek(): string
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->startOfWeek()->addDays(6);

        $attendances = $this->user->employee->attendance()
            ->whereBetween('in_time', [$startOfWeek, $endOfWeek])
            ->whereNotNull('out_time')
            ->get();

        $totalMinutes = 0;

        foreach ($attendances as $attendance) {
            $inTime = Carbon::parse($attendance->in_time);
            $outTime = Carbon::parse($attendance->out_time);
            $totalMinutes += $inTime->diffInMinutes($outTime);
        }

        $remainingHours = max(0, 2400 - $totalMinutes);
        $hours = $remainingHours / 60;
        $minutes = ($hours - floor($hours)) * 60;

        return sprintf('%02d:%02d', $hours, $minutes);
    }

    public function render()
    {
        return view('livewire.booking-panel');
    }
}
