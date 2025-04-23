<?php

namespace App\Observers;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Log;
use App\Mail\SendVerificationCode;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user)
{
    Log::info('UserObserver triggered for: ' . $user->email);

    if (isset($user->plain_password)) {
        Log::info('Plain password available: ' . $user->plain_password);

        // Send the email
        Mail::to($user->email)->/*queue*/send(new UserRegisteredMail(
            $user->email,
            $user->plain_password
        ));
    } else {
        Log::warning('Plain password is NOT available!');
    }
}



    public function updated(User $user): void
    {
        if ($user->isDirty('verification_code') && $user->verification_code) {
            Mail::to($user->email)->send(new SendVerificationCode($user));
        }
    }


    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
