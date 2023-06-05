<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Patient;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\DoctorPatient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

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
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    public function tests(Request $request)
    {
        $userId = 3;

        $user = User::findOrFail($userId);
        dd($user);

        $noteId = 1;

        $note = Note::findOrFail($noteId);


        // $patients = DoctorPatient::where('doctor_id', $user->doctor->id)->get();

        // dd( $user->doctor->patients->first()->user->name);
        // dd($user->type, $user->doctor, $user->patients);
        // dd($user->type, $user->patient, $user->doctors);
    }
}
