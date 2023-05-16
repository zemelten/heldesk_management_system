@component('mail::message')
# New Ticket Created

@component('mail::panel')
Customer: {{ $ticket->customer->full_name}}
@endcomponent

## Request Description:

@component('mail::table')
|Request | Value |
| ------------- |:-------------:|
| Problem | {{ $ticket->problem->name}} |
| Building | {{ $ticket->organizationalUnit->building->name}} |
| Customer | {{ $ticket->customer->full_name}} |
| Description | {{ $ticket->description}} |

@endcomponent


@component('mail::button', ['url' => route('tickets.show',$ticket)])
Go to Ticket
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent