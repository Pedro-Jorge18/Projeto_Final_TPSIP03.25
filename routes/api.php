<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Registrar Novo Utilizador

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:5|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    Auth::login($user);

    return response()->json(['success' => 'completed', 'user' => true]);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:5'
    ]);
    if (!auth()->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    $request->session()->regenerate();
    return response()->json(['success' => 'login completed', 'user' => Auth::user()]);
});

//logout

Route::get('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json(['success' => 'logout completed']);
});
