@extends('layouts.master')

@section('content')
    @include('partials.header')
    @include('partials.nav' , ['page' => 'all_users'])
    <!-- Main -->
    <div id="main">
        @include('partials.user_list_header')
        <section class="posts">
            @foreach(Auth::user()->getUserList() as $list)
            <article>
                @include('partials.user_profile_card' , ['user' => $list])
            </article>
            @endforeach
        </section>
    </div>
@endsection
@section('after-scripts')
    <script>
            function followUSer(id){
                $.ajax({
                    type: 'post',
                    url: "{{route('follow.user')}}",
                    data: {'_token': "{{csrf_token()}}", "follow_id": id, 'user_id': "{{Auth::user()->id}}"},
                    success: function(data ,status){
                        $('.'+id+'_follow_button').text(data);
                    }
                });
            }
    </script>
    @endsection