<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function signup(Request $request){
        Validator::make($request->all(), [
            'name' => 'required | string | max:50',
            'email' => 'required | email | max:255',
            'password' => 'required | min:5 | max:20'
        ])->validate();
dd('in');
        $user = User::store($request);

        return  $this->sendResponse(200, $user);
    }
}
