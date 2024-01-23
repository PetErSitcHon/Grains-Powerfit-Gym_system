<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Attendance;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function attendances()
    {
        return view('attendance');
    }

    public function checkIn()
    {
        $now = $this->freshTimestamp();

        return $this->attendances()->create([
            'day' => $now->format('Y-m-d'),
            'time_in' => $now->format('H:i:s')
        ]);
    }

    public function checkOut()
    {
        $now = $this->freshTimestamp();

        return $this->attendances()
                    ->where('day', $now->format('Y-m-d'))
                    ->whereNull('time_out')
                    ->firstOrFail()
                    ->update([
                        'time_out' => $now->format('H:i:s'),
                    ]);
    }
}
