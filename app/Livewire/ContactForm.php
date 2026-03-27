<?php

namespace App\Livewire;

use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $message = '';

    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string|max:5000',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        Mail::to('info@dustanddaisiestours.co.za')
            ->send(new ContactFormSubmission(
                name: $this->name,
                email: $this->email,
                phone: $this->phone ?: null,
                messageBody: $this->message,
            ));

        $this->reset(['name', 'email', 'phone', 'message']);
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
