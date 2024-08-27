<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $provinces = $this->fetchProvinces();
        return view('auth.register', compact('provinces'));
    }
    

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'telepon' => $validatedData['telepon'],
            'provinsi_id' => $validatedData['provinsi_id'],
            'kota_id' => $validatedData['kota_id'],
            'kecamatan_id' => $validatedData['kecamatan_id'],
            'kelurahan_id' => $validatedData['kelurahan_id'],
            'kode_pos' => $validatedData['kode_pos'],
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Pendaftaran berhasil!');
    }

    protected function fetchProvinces()
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        return $response->json();
    }

    protected function fetchCities($provinceId)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        return $response->json();
    }

    protected function fetchDistricts($regencyId)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/{$regencyId}.json");
        return $response->json();
    }

    protected function fetchVillages($districtId)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/villages/{$districtId}.json");
        return $response->json();
    }
}
