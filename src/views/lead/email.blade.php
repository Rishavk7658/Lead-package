@component('mail::message')
# Introduction

{{$data['message']}}
{{$data['link']}}

@component('mail::button', ['url' => $data['link']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
