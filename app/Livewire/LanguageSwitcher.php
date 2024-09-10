<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    public $locale;

    public function mount()
    {
        $this->locale = session()->get('locale', App::getLocale());
    }

    public function switchLanguage($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        $this->locale = $locale;

        return redirect()->to(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
