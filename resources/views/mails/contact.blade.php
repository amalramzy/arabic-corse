@component('mail::message')
# Contact Form Message

# Name:{{$name}}

# Email:{{$email}}

# Subjest:{{$subject}}

# message:{{$message}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
