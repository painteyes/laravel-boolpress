@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="posts">

            <h1>All posts</h1> 

            {{-- <div>Search by</div> --}}

            <h5>Search by</h5>
            <ul>
                <li>
                    <a class="" href="{{route('admin.categories')}}">
                        Categories
                    </a>
                </li>
            </ul>
                
            <div class="row row-cols-2">
                @foreach ($posts as $post)
                    <div class="col">

                        {{-- Post --}}
                        <a href ="{{route('admin.posts.show', ['post' => $post->id])}}">
                            <div class="card">
                                <div class="card-body">

                                    {{-- thumb --}}
                                    @if ($post->cover)
                                        <div class="thumb">     
                                            <img src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
                                        </div>
                                    @endif

                                    {{-- preview text --}}
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

        {{-- Indexes linked to pages --}}
        {{$posts->links()}}

    </section>     
@endsection