<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class BookingList extends Component
{
    public $user;
    public $listOfBookings = [];

    public function mount($user)
    {
        $this->user = $user;
        $this->listOfBookings = $this->getListOf7DaysWorked();
    }

    #[On('attendanceAdded')]
    public function updateBookings()
    {
        $this->listOfBookings = $this->getListOf7DaysWorked();
    }

    public function getListOf7DaysWorked()
    {
        $attendances = $this->getAttendanceForLast7Days();
        $attendanceList = [];

        foreach ($attendances as $attendance) {
            $date = Carbon::parse($attendance->in_time)->format('Y-m-d');

            if ($attendance->out_time) {
                $attendanceList[] = [
                    'date' => $date,
                    'time' => Carbon::parse($attendance->out_time)->format('H:i:s'),
                    'event' => 'Out',
                    'message' => __('messages.Out'),
                ];
            }

            $attendanceList[] = [
                'date' => $date,
                'time' => Carbon::parse($attendance->in_time)->format('H:i:s'),
                'event' => 'In',
                'message' => __('messages.In'),
            ];
        }

        return $attendanceList;
    }

    public function getAttendanceForLast7Days()
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        return $this->user->employee->attendance()
            ->whereBetween('in_time', [$startDate, $endDate])
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.booking-list', [
            'listOfBookings' => $this->listOfBookings
        ]);
    }
}
