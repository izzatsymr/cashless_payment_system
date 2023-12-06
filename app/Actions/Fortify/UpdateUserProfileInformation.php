<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation {
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'phone_no' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        // Update user's profile information
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'date_of_birth' => $input['date_of_birth'],
            'gender' => $input['gender'],
            'phone_no' => $input['phone_no'],
            'address' => $input['address'],
        ])->save();

        // If a new photo is uploaded, update profile photo
        if(isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // If email is updated and user is MustVerifyEmail, update verified user
        if($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'date_of_birth' => $input['date_of_birth'],
            'gender' => $input['gender'],
            'phone_no' => $input['phone_no'],
            'address' => $input['address'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
