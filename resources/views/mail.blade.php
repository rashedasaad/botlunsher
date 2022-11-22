@component("mail::message")
{{ $info["subject"] }}  
body: {{ $info["body"] }}  

<a rel="stylesheet" href="{{ $info["code_link"] }}">press here</a>






@endcomponent
