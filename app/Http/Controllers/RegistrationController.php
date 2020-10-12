<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class RegistrationController extends Controller {
    public function store(Request $request) {

      $User = new User;

      $User->name = $request->name;
      $User->email = $request->email;
      $User->password = $request->password;
      $User->phone = $request->phone;    
      
      $User->save();
      auth()->login($User);

      return response("Account Created!");
      
     
    }


    public function login(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required'
           ]);
      
           $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
           );
      
           if(Auth::attempt($user_data))
           {
            return redirect('/');
           }
           else
           {
            return back()->with('error', 'Wrong Login Details');
           }
    }

    public function logout()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
}
