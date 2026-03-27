<x-mail::message>
# New Booking Request

**Tour:** {{ $tour }}
**Preferred Date:** {{ $preferredDate }}
**Number of Guests:** {{ $guests }}

**Name:** {{ $name }}
**Email:** {{ $email }}
**Phone:** {{ $phone }}

@if($messageBody)
**Additional Message:**

{{ $messageBody }}
@endif

<x-mail::button :url="'mailto:'.$email">
Reply to {{ $name }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
