<?php

namespace App\Http\Livewire;

use App\Domains\Auth\Models\User;
use Livewire\Component;

class SearchUsers extends Component{


    public $search = '';

    public function render(){

        return view('backend.auth.livewire.users', [
            'users' => User::where('name','LIKE', "%$this->search%")->get()
        ]);
    }
}
