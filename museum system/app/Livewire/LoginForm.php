<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    #[Validate('required')] 
    public $email;

    #[Validate('required')] 
    public $password;

    public function submit()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {

            $roles = Auth::user()->roles->pluck('name');
            $to = '/';
            if(count($roles)) {
                switch($roles[0]){
                    case 'admin': 
                        $to = '/cabinet/admin';
                        break;
                    case 'accountant': 
                        $to = '/cabinet/accountant';
                        break;
                    case 'employee': 
                        $to = '/cabinet/employee';
                        break;
                }
            }
            // Authentication was successful
            return redirect()->intended($to);
        } else {
            // Authentication failed
            $this->addError('email', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
