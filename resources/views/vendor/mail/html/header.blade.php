<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'App_control_task')
{{-- <img src="http://localhost:8000/img/logo.png" class="logo" alt="Laravel Logo"> --}}
<img src="{{asset('img/logo.png')}}" class="logo" alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
