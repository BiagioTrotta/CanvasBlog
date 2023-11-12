<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Verifica se esiste già un utente con lo stesso ID Google
            $existingUser = User::where('google_id', $google_user->getId())->first();

            if ($existingUser) {
                // Se l'utente esiste, effettua il login e reindirizza
                Auth::login($existingUser);
                return redirect()->intended('/');
            }

            // Se l'utente non esiste, verifica l'email
            $userByEmail = User::where('email', $google_user->getEmail())->first();

            if ($userByEmail) {
                // Se esiste un utente con la stessa email, esegui il login e reindirizza
                Auth::login($userByEmail);
                return redirect()->intended('/');
            }

            // Se non esiste alcun utente con lo stesso ID Google o la stessa email, crea un nuovo utente
            $new_user = User::create([
                'name' => $google_user->getName(),
                'email' => $google_user->getEmail(),
                'google_id' => $google_user->getId(),
                'password' => bcrypt(Str::random(12)),
            ]);

            // Effettua il login con il nuovo utente e reindirizza
            Auth::login($new_user);
            return redirect()->intended('/');
        } catch (\Throwable $th) {
            // Gestisci gli errori in modo appropriato
            dd('Something went wrong!' . $th->getMessage());
        }
    }
}
