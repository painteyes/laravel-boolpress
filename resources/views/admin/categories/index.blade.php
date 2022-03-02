@extends('layouts.dashboard')

@section('content')
    <section>
        <h2>Categories</h2>
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item w-25">
                    <a href="{{route('admin.category_info', ['slug'=> $category->slug])}}" class="d-flex justify-content-between align-items-center">
                        <span>{{$category->name}}</span>
                        <span class="badge badge-primary badge-pill">{{$category->posts->count()}}</span>
                    </a>
                </li>     
            @endforeach
        </ul>
    </section>
@endsection