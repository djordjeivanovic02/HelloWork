<?php

namespace App\Http\Controllers;

use App\Mail\ChangePasswordMail;
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
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!'], 200);
            }

            $credentials = $request->only('email', 'password');

            if (auth()->attempt($credentials)) {
                return response()->json(['type' => 'success', 'redirect' => '/']);
            }

            return response()->json(['type' => 'error', 'errors' => ['email' => 'Pogrešna email adresa ili lozinka']], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 200);
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
            // auth()->login($user);
            $tip = 'poslodavac';
            if ($request->type == 1)
                $tip = 'kandidat';

            $user->logActivity('register', 'Nova registracija na platformi: ' . $user->email . ' kao ' . $tip);
            Mail::to($user->email)->send(new VerificationMail($user));
            return response()->json(['type' => 'success', 'message' => 'Uspešno ste se registrovali, na vašu email adresu je poslat email za verifikaciju', 'redirect' => '/'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 200);
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
    public function showResetPassword($id)
    {
        return view('verification.change-password', ['id' => $id]);
    }
    public function signOut()
    {
        auth()->logout();
        return redirect('/');
    }

    public function verifyEmail($id)
    {
        try {
            $user = User::where('id', $id)->first();
            if ($user) {
                $user->email_verified_at = now();
                $user->save();

                return view('verification.email-verification', [
                    'type' => 'success'
                ]);
            } else {
                return view('verification.email-verification', [
                    'type' => 'error'
                ]);
            }
        } catch (Exception $ex) {
            return view('verification.email-verification', [
                'type' => 'error'
            ]);
        }
    }

    public function resendEmailVerification($email)
    {
        try {
            $user = User::where('email', $email)->first();
            if ($user) {
                Mail::to($user->email)->send(new VerificationMail($user));
                return response()->json(['type' => 'success', 'message' => 'Poslat verifikacioni mail'], 200);
            } else {
                return response()->json(['type' => 'not-exist', 'message' => 'Korisnik ne postoji'], 200);
            }
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => 'Došlo je do greške!'], 500);
        }
    }

    public function sendResetPasswordEmail($email)
    {
        try {
            $user = User::where('email', $email)->first();
            if ($user) {
                Mail::to($user->email)->send(new ChangePasswordMail($user));
                return response()->json(['type' => 'success', 'message' => 'Poslat mail za resetovanje lozinke'], 200);
            } else {
                return response()->json(['type' => 'not-exist', 'message' => 'Korisnik ne postoji'], 200);
            }
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}
