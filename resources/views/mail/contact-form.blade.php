<x-mail::message>
# New Contact Form Submission

**Name:** {{ $name }}
**Email:** {{ $email }}
@if($phone)
**Phone:** {{ $phone }}
@endif

**Message:**

{{ $messageBody }}

<x-mail::button :url="'mailto:'.$email">
Reply to {{ $name }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
