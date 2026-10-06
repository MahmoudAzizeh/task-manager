<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Show the profile edit page.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully!');
    }


    /**
     * Show the change password page.
     */
    public function password()
    {
        return view('profile.password');
    }


    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('profile.edit')
            ->with(
                'success',
                'Password updated successfully!'
            );
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Validate current password
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'password' => [
                'required',
                'current_password',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        auth()->logout();


        /*
        |--------------------------------------------------------------------------
        | Delete user
        |--------------------------------------------------------------------------
        */

        $user->delete();


        /*
        |--------------------------------------------------------------------------
        | Invalidate session
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/')
            ->with(
                'success',
                'Your account has been deleted successfully.'
            );
    }
}
