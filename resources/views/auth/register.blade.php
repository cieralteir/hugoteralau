@extends('template.main')

@section('content')
    <br>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <h4> Register </h4>

        <input name = "name" class = "no-border" placeholder = "Name" style = "text-align: center">
        <input name = "email" class = "no-border" placeholder = "Email" style = "text-align: center">
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
