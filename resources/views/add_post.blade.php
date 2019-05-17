@extends('layouts.master')

@section('content')

    @include('partials.header')
    @include('partials.nav' , ['page' => 'add_post'])
    <!-- Main -->


    <div id="main">

        <!-- Featured Post -->
        <article class="post featured">
            <header class="major">
                <span class="date">{{\Illuminate\Support\Carbon::today()}}</span>
                <h2>Add Post</h2>
            </header>
            <section>
                <form method="post" action="{{route('store.post')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="fields">
                        <div class="field">
                            <label for="name">Image</label>
                            <input required type="file" name="image" id="name" />
                        </div>
                        <div class="field">
                            <label for="title">Title</label>
                            <input required type="text" name="title" id="title" />
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea required name="message" id="message" rows="3"></textarea>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><button type="submit" >Upload Post</button></li>
                    </ul>
                </form>
            </section>
        </article>
    </div>


@endsection