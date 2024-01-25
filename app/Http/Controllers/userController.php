<?php

namespace App\Http\Controllers;


use App\Enums\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function create(){
        return view('users.register');

    }


    public function store(Request $request){



        $formFields =$request->validate([
            'name'=>['required', 'min:3'],
            'email' =>['required', 'email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'

        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');

       

    }

    public function login(){
        return view('users.login');
    }

    

    public function logout(Request $request){
        auth()->logout();
        $request-> session()->invalidate();
        $request-> session()->regenerateToken();

        return redirect('/')->with('message','you have been logged out');

    }

    

    public function authenticate(Request $request){
        $formFields =$request->validate([
           
            'email' =>['required', 'email'],
            'password' => 'required'

        ]);

        if(auth()->attempt($formFields)){
            $request ->session()->regenerate();
            return redirect('/')->with('message', 'you are logged in');


        }

        return back()->withErrors(['email'=> 'Invalid Credentials'])->onlyInput('email');

        
    }

    public function index(){
        return view('users.dashboard',[
            'users'=>User::all()
        ]);

    }
    public function destroy(User $users){
        $users->delete();
        return back()->with('message', 'User deleted succefully');
    }

    public function edit(User $users){
        return view('users.edit',[
            'users'=>$users,
            'roles'=>Role::cases()
        ]);
    }

    public function update(Request $request, User $users){
        $formFields = $request->validate([
            'name'=>['required'],
            'email' =>['required', 'email'],
            'role_id'=>['required', Rule::in(Role::cases())]
        ]);

        $users->update($formFields);
        return redirect('/')->with('message', 'User updated succefully');
    }



}
