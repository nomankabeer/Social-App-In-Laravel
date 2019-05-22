@extends('layouts.master')
@section('content')
    @include('partials.header')
    @include('partials.nav' , ['page' => 'index'])
    <div id="main">
        <section class="posts">
            @foreach(Auth::user()->getPosts() as $post)
                <article>
                    <header>
                        <span>
                            <img src="{{asset('images/').'/'.$post->avatar}}" alt="" style="height: 70px; width: 70px; border-radius: 100%; " />
                            <br>
                            <span class="date"> {{$post->name}} <br> {{$post->created_at}}</span>
                        </span>
                        <h3><a href="#">{{$post->title}}</a></h3>
                    </header>
                    <a href="#" class="image fit"><img src="{{asset('images/').'/'.$post->image}}" alt="" /></a>
                    <ul class="actions special">
                        <li><a href="{{route('post.details', $post->id)}}" class="button">Full Story</a></li>
                    </ul>
                </article>
            @endforeach
        </section>
    </div>
@endsection