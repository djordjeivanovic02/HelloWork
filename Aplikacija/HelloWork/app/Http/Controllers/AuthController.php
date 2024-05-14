<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function login(){
        try{
            validator(request()->all(),[
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if(auth()->attempt(request()->only(['email', 'password']))){
                return response()->json(['redirect' => '/user']);
            }
            // return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
            return response()->json(['errors' => ['email' => 'Invalid Credentials']], 422);
        }catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function register(Request $request){
        try{
            validator(request()->all(), [
                'email' => ['required', 'email'],
                'password' => ['required'],
                'type' => ['required']
            ]);
            $emailExist = User::where('email', $request->email)->exists();
            if($emailExist){
                throw new Exception("Već postoji korisnik sa unetom email adresom");
            }
            $data = $request->all();
            $this->createUser($data);
            return response()->json(['message' => 'Korisnik je uspešno registrovan'], 200);
        }catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()], 500);
        }
        //return redirect
    }

    public function signOut(){
        auth()->logout();
        return redirect('/');
    }

    private function createUser(array $data){
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type']
        ]);
    }
}
