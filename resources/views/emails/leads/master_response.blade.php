<x-mail::message>
# Regarding Your Service Request

Hello {{ $lead->client_full_name }},

Here is an update regarding your service request:

---

{!! nl2br(e($lead->master_response)) !!}

---

If you have any questions, please reply to this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
