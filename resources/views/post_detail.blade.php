@extends('layouts.master')
@section('content')
	@include('partials.header')
	@include('partials.nav')
					<div id="main">
						<!-- Post -->
							<section class="post">
								<header class="major">
									<span class="date">{{$post->created_at}}</span>
									<h1>{{$post->title}}</h1>
								</header>
								<div class="image main">
									<img src="{{asset('images').'/'.$post->image}}" alt="" />
								</div>
								<p>{{$post->message}}</p>
                                <div class="detailBox">
									<div class="titleBox displayflex">
										<button class=" like_msg likeButton width50 btn btn-default">{{$post->like_dislike[0]}} <span class=" other_like_msg badge badge-success">{{$post->like_dislike[1]}}</span></button>
										<button class=" dislike_msg dislikeButton width50 btn btn-default">{{$post->like_dislike[2]}} <span class=" other_dislike_msg badge badge-danger">{{$post->like_dislike[3]}}</span></button>
									</div>
									<div class="titleBox">
										<label>Comment Box</label>
									</div>
									<div class="commentBox justify-content-center">
											<div class="form-group">
												<input class=" comment width100 form-control" type="text" placeholder="Your comments" />
											</div>
											<div class="form-group">
												<button class="addComment width100 btn btn-default">Add</button>
											</div>
									</div>
									<div class="actionBox">
										<ul class="myComments commentList"> </ul>
									</div>

								</div>
							</section>
					</div>

@endsection
@section('after-scripts')
	<script>
		$(document).ready(function(){
            getComments();
		    //Click on like post button
		    $('.likeButton').click(function(){
                callAjaxToLikeOrDislikePost("{{$post->id}}" , 1);
			});
		    //click on dislike post button
            $('.dislikeButton').click(function(){
                callAjaxToLikeOrDislikePost("{{$post->id}}" , 0);
            });
            //Add Comment
			$('.addComment').click(function(){
			    var comment = $('.comment').val();
			    if(comment != null && comment != ''){
			        addComment("{{$post->id}}" , comment);
				}
			});

		});
		function callAjaxToLikeOrDislikePost(id , value) {
            $.ajax({
                type: "POST",
                url: "{{route('like_dislike_post')}}",
                data: { _token: "{{ csrf_token() }}", post_id: id , value: value},
                success: function(data , status){
                    $('.like_msg').html(data[0] +'<span class=" other_like_msg badge badge-success">'+ data[1] +'</span>');
                    $('.dislike_msg').html(data[2] +'<span class=" other_like_msg badge badge-danger">'+ data[3] +'</span>');
                    // console.log(data , status , 'data status');
                },
            });
        }
        function getComments(){
		    $.ajax({
				type: "get",
				url: "{{route('get_comment' , $post->id)}}",
				success: function(data , status){
				    var asset = "{{asset('images').'/'}}";
                    $('.comment').val('');
                    $('.myComments').html('');
				    $.each(data , function(index , row){
				        $('.myComments').append('' +
							'<li>\n' +
                            '<div class="commenterImage">\n' +
                            '<img src="'+asset+'/'+row.user_details.avatar+'" />\n' +
                            '</div>\n' +
                            '<div class="commentText">\n' +
                            '<p class=""> '+row.comment+' <span class="date sub-text">'+row.created_at+'</span></p><br>\n' +
                            '</div>\n' +
                            '</li>\n');
					});
				}
			});
		}
        function addComment(id , comment){
		    $.ajax({
				type: "post",
				url: "{{route('add_comment')}}",
				data: { _token: "{{csrf_token()}}" , post_id: id , comment: comment},
				success: function(data , status){
                    getComments();
				}
			});
		}
	</script>
	@endsection