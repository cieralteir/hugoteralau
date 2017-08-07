@extends('template.main')

@section('content')
    <br>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

        <h4> Login </h4>
        
        <input name = "_token" type = "hidden" value = "{{ csrf_token() }}">
        <input name = "email" class = "no-border" placeholder = "Username" style = "text-align: center">
        <input name = "password" class = "no-border" placeholder = "Password" style = "text-align: center">
    </form>

    <script>
        $('input').keydown(function(e) {
            if (e.keyCode == 13) {
                $(this).closest('form').submit();
            }
        });
    </script>
@endsection
