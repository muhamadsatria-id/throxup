<?php

use App\Models\User;
use Filament\Auth\Notifications\ResetPassword;
use Filament\Auth\Pages\PasswordReset\RequestPasswordReset;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Notification;

it('mengirim link reset password ke email admin', function () {
    Notification::fake();

    $user = User::factory()->create();

    Filament::setCurrentPanel('admin');

    Livewire::test(RequestPasswordReset::class)
        ->fillForm(['email' => $user->email])
        ->call('request')
        ->assertHasNoFormErrors();

    Notification::assertSentTo($user, ResetPassword::class);
});
