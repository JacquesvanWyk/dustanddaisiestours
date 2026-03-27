<?php

use App\Livewire\ContactForm;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

it('validates required fields', function () {
    Livewire::test(ContactForm::class)
        ->call('submit')
        ->assertHasErrors(['name', 'email', 'message']);
});

it('validates email format', function () {
    Livewire::test(ContactForm::class)
        ->set('name', 'Test')
        ->set('email', 'not-an-email')
        ->set('message', 'Hello')
        ->call('submit')
        ->assertHasErrors(['email']);
});

it('sends email on valid submission', function () {
    Mail::fake();

    Livewire::test(ContactForm::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('phone', '0821234567')
        ->set('message', 'I would like to book a tour.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('sent', true);

    Mail::assertSent(ContactFormSubmission::class, function ($mail) {
        return $mail->hasTo('info@dustanddaisiestours.co.za');
    });
});
