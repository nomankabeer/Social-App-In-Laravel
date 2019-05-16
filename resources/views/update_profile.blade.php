@extends('layouts.master')

@section('content')

    @include('partials.header')
    @include('partials.nav')
    <!-- Main -->


    <div id="main">

        <!-- Featured Post -->
        <article class="post featured">
            <header class="major">
                <span class="date"></span>
                <h2>Update Profile</h2>
            </header>
            <section>
                <form method="post" action="{{route('update.user.profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="fields">
                        <div class="field">
                            <label for="name">Avatar</label>
                            <input required type="file" name="avatar" id="name" />

                        </div>
                        <div class="field">
                            <label for="title">Name</label>
                            <input required type="text" name="name" id="title" value="{{Auth::user()->name}}" />
                        </div>
                        <div class="field">
                            <label for="title">Email</label>
                            <input required type="text" name="email" id="title" value="{{Auth::user()->email}}" />
                        </div>
                    </div>
                    <ul class="actions">
                        <li><button type="submit" >Update Profile</button></li>
                        <li><button><a href="{{route('profile')}}" > Cancel</a></button></li>
                    </ul>
                </form>
            </section>

        </article>
    </div>


@endsection