<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Exception;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if ($validator->fails()) {
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!'], 400);
            }

            $credentials = $request->only('email', 'password');

            if (auth()->attempt($credentials)) {
                return response()->json(['type' => 'success', 'redirect' => '/']);
            }

            return response()->json(['type' => 'error', 'errors' => ['email' => 'Invalid Credentials']], 422);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'email' => ['required', 'email'],
                'password' => ['required'],
                'type' => ['required']
            ]);

            if ($validator->fails()) {
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!', 500]);
            }
            $emailExist = User::where('email', $request->email)->exists();
            if ($emailExist) {
                return response()->json(['type' => 'email-used', 'message' => 'Već postoji nalog sa ovom email adresom. Pokušaj da se prijaviš.'], 200);
            }
            $data = $request->all();
            $user = $this->createUser($data);

            auth()->login($user);

            return response()->json(['type' => 'success', 'redirect' => '/'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
        //return redirect
    }

    public function signOut()
    {
        auth()->logout();
        return redirect('/');
    }

    private function createUser(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type']
        ]);
    }
}
