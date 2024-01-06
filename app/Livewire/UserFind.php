<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserFind extends Component
{
    public $result;

    public function search($text)
    {
        if($text != '')
        {
            $this->result = User::where('id', 'LIKE', "%{$text}%")
            ->orWhere(DB::raw('lower(name)'), 'like', '%' . strtolower($text) . '%')
            ->orWhere(DB::raw('lower(surname)'), 'like', '%' . strtolower($text) . '%')
            ->orWhere('email', 'LIKE', "%{$text}%")
            ->orWhere('phone', 'LIKE', "%{$text}%")
            ->orWhere('id_code', 'LIKE', "%{$text}%")
            ->orderBy('id','ASC')
            ->get();
        }else{
            $this->result = [];
        }

    }

    public function render()
    {
        return view('livewire.user-find');
    }
}
