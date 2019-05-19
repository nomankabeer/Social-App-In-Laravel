@extends('layouts.master')

@section('content')
    @include('partials.header')
    @include('partials.nav' , ['page' => 'all_users'])
    <!-- Main -->
    <div id="main">
        @include('partials.user_list_header')
        <section class="posts">
            @foreach(Auth::user()->getFollowerUserList() as $list)
            <article>
                @include('partials.user_profile_card' , ['user' => $list])
            </article>
            @endforeach
        </section>
    </div>
@endsection