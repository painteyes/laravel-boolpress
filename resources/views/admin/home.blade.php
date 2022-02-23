@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            <h1>Welcome, {{$user->name}}</h1>

            @if ($user_info)
                <p>Phone number: {{$user_info->phone}}</p>
                <div>Address: {{$user_info->address}}</div>
            @endif
            
        </div>
    </section>
@endsection