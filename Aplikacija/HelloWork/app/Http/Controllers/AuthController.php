<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Exception;
use Mail;
use Validator;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class AuthController extends Controller implements MustVerifyEmail
{
    use MustVerifyEmailTrait;
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

            $user->sendEmailVerificationNotification();

            // auth()->login($user);
            $tip = 'poslodavac';
            if ($request->type == 1)
                $tip = 'kandidat';

            $user->logActivity('register', 'Nova registracija na platformi: ' . $user->email . ' kao ' . $tip);
            Mail::to($user->email)->send(new VerificationMail($user));
            return response()->json(['type' => 'success', 'message' => 'Uspešno ste se registrovali, na vašu email adresu je poslat email za verifikaciju', 'redirect' => '/'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
        //return redirect
    }

    private function createUser(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type']
        ]);
    }
    public function signOut()
    {
        auth()->logout();
        return redirect('/');
    }

    public function verifyEmail($id)
    {
        return view('verification.email-verification', [
            'user' => User::where('id', $id)
        ]);
    }
}
