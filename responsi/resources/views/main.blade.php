@if (auth()->user()->level == "admin")
    {{  header("location: products") }}
@else
    {{ header("location: catalogue") }}
@endif
