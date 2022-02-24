@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="alert alert-success" role="alert">
            <h3 class="alert-heading">Well done!</h3>
            <p>You're logged into the admin area.</p>
            <hr>
            @if ($user_info)
                <div class="mb-0">Name: {{$user->name}}</div>
                <div class="mb-0">Phone number: {{$user_info->phone}}</div>
                <div class="mb-0">Address: {{$user_info->address}}</div>
            @endif
        </div>
    </section>
@endsection