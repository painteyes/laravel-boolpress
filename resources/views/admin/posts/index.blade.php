@extends('layouts.dashboard')

@section('content')
    <section class="posts">
        <div class="container">
            <h1>All posts</h1>  
            <div class="row row-cols-2">
                @foreach ($posts as $post)                 
                    <div class="col">
                        <a href ="{{ route('admin.posts.show', ['post' => $post->id])}}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="poster">
                                        {{-- <img src="{{$recipes[$loop->index]['img']}}" alt=""> --}}
                                    </div>
                                    <div class="text-area"> 
                                        <h5 class="card-title">{{ $post->title }}</h5>               
                                        <p class="card-text">
                                            {{ Str::substr($post->content, 0, 200) }}...
                                            <span>Read more</span>
                                        </p>
                                    </div>                             
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>  
        </div>
    </section> 
@endsection