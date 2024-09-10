<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';

    public function login()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('booking-page');
        }

        session()->flash('error', __('messages.user_email_not_found'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}
