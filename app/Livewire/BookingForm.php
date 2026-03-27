<?php

namespace App\Livewire;

use App\Mail\BookingRequest;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class BookingForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $tour = '';

    public int $guests = 4;

    public string $preferred_date = '';

    public string $message = '';

    public bool $sent = false;

    public static array $tours = [
        'The Copper Tour',
        'Kamiesberg Culture Tour',
        'Flower Hunt Tour',
        'Geological Wonder Trip',
        'Goegap Nature Reserve Day Hike',
        'Lewerberg Houtpad Hiking Trail',
        'Bruinkop Hiking Trail',
        "Nicky's Ponder Trail",
    ];

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'tour' => 'required|string',
            'guests' => 'required|integer|min:1',
            'preferred_date' => 'required|date|after:today',
            'message' => 'nullable|string|max:5000',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        Mail::to('info@dustanddaisiestours.co.za')
            ->send(new BookingRequest(
                name: $this->name,
                email: $this->email,
                phone: $this->phone,
                tour: $this->tour,
                guests: $this->guests,
                preferredDate: $this->preferred_date,
                messageBody: $this->message ?: null,
            ));

        $this->reset(['name', 'email', 'phone', 'tour', 'guests', 'preferred_date', 'message']);
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}
