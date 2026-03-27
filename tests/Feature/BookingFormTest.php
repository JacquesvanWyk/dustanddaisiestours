<?php

use App\Livewire\BookingForm;
use App\Mail\BookingRequest;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

it('validates required fields', function () {
    Livewire::test(BookingForm::class)
        ->set('tour', '')
        ->set('phone', '')
        ->set('preferred_date', '')
        ->call('submit')
        ->assertHasErrors(['name', 'email', 'phone', 'tour', 'preferred_date']);
});

it('validates date must be in the future', function () {
    Livewire::test(BookingForm::class)
        ->set('name', 'Test')
        ->set('email', 'test@example.com')
        ->set('phone', '082123')
        ->set('tour', 'The Copper Tour')
        ->set('guests', 4)
        ->set('preferred_date', '2020-01-01')
        ->call('submit')
        ->assertHasErrors(['preferred_date']);
});

it('sends booking email on valid submission', function () {
    Mail::fake();

    Livewire::test(BookingForm::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('phone', '0821234567')
        ->set('tour', 'The Copper Tour')
        ->set('guests', 4)
        ->set('preferred_date', now()->addMonth()->format('Y-m-d'))
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('sent', true);

    Mail::assertSent(BookingRequest::class, function ($mail) {
        return $mail->hasTo('info@dustanddaisiestours.co.za')
            && $mail->tour === 'The Copper Tour';
    });
});
