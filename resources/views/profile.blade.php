@extends('layouts.master')

@section('content')
    @include('partials.header' , ['page' => 'profile'])
    @include('partials.nav' , ['page' => 'profile'])
    <!-- Main -->
    <div id="main">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('update.profile')}}">Update Profile</a>
            </li>
        </ul>
        <section class="posts">
            @foreach(Auth::user()->getUserProfilePosts() as $post)
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
                        <li><a href="#" class="button">Full Story</a></li>
                    </ul>
                </article>
            @endforeach
        </section>

        <!-- Footer -->
        <footer>
            <div class="pagination">
                <!--<a href="#" class="previous">Prev</a>-->
                <a href="#" class="page active">1</a>
                <a href="#" class="page">2</a>
                <a href="#" class="page">3</a>
                <span class="extra">&hellip;</span>
                <a href="#" class="page">8</a>
                <a href="#" class="page">9</a>
                <a href="#" class="page">10</a>
                <a href="#" class="next">Next</a>
            </div>
        </footer>

    </div>


@endsection