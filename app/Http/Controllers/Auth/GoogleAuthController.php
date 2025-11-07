<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    /**
     * Redirect user ke Google untuk autentikasi
     * Mode Demo: Langsung login tanpa Google OAuth
     */
    public function redirectToGoogle()
    {
        // Cek apakah Google credentials sudah diisi
        if (!config('services.google.client_id')) {
            // Mode Demo: Langsung buat/login user demo
            return $this->demoGoogleLogin();
        }
        
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google setelah autentikasi
     */
    public function handleGoogleCallback()
    {
        try {
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->user();
            
            // Cek apakah user sudah ada di database berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();
            
            if ($user) {
                // Jika user sudah ada, login langsung
                Auth::login($user);
            } else {
                // Jika user belum ada, buat user baru dengan role 'staff' (user biasa)
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Password random karena login via Google
                    'role' => 'staff', // Default role untuk user Google
                    'email_verified_at' => now(), // Google sudah verify email
                ]);
                
                Auth::login($user);
            }
            
            // Redirect ke home (halaman beranda user)
            return redirect()->route('home')->with('success', 'Berhasil login dengan Google!');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login dengan Google. Silakan coba lagi.');
        }
    }
    
    /**
     * Demo Google Login (untuk development tanpa credentials)
     */
    private function demoGoogleLogin()
    {
        // Generate email unik berdasarkan timestamp
        $timestamp = now()->timestamp;
        $email = "user.google.{$timestamp}@demo.com";
        
        // Cek apakah user dengan email ini sudah ada
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            // Buat user baru dengan data demo
            $user = User::create([
                'name' => 'User Google ' . $timestamp,
                'email' => $email,
                'password' => bcrypt(Str::random(16)),
                'role' => 'staff',
                'email_verified_at' => now(),
            ]);
        }
        
        // Login user
        Auth::login($user);
        
        // Redirect ke home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Berhasil login dengan Google! (Demo Mode)');
    }
}
