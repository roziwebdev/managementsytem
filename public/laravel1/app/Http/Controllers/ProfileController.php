<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'profile_photo' => ['nullable', 'image', 'max:2048'], // Sesuaikan dengan kebutuhan Anda
        ]);

        // Update data profil
        $user->fill($request->validated());

        // Cek apakah alamat email telah berubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Cek apakah ada file foto profil yang diunggah
        if ($request->hasFile('profile_photo')) {
            // Validasi dan simpan foto profil baru
            $request->validate([
                'profile_photo' => ['image', 'max:2048'], // Sesuaikan dengan kebutuhan Anda
            ]);

            // Hapus foto profil lama jika ada
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Simpan foto profil baru
            $user->profile_photo_path = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        // Simpan perubahan data profil
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
