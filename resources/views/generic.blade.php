@extends('layouts.app')
@section('content')
	@include('partials.header')
	@include('partials.nav')
					<div id="main">
						<!-- Post -->
							<section class="post">
								<header class="major">
									<span class="date">April 25, 2017</span>
									<h1>This is a<br />
									Generic Page</h1>
								</header>
								<div class="image main"><img src="images/pic01.jpg" alt="" /></div>
								<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur id ipsum sit amet, fergiat. Pellentesque in mi eu massa lacinia malesuada et a elit. Donec urna ex, lacinia in purus ac, pretium pulvinar mauris. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur sapien risus, commodo eget turpis at, elementum convallis enim turpis, lorem ipsum dolor sit amet nullam.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus. Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur id ipsum.</p>











								<style>

									.detailBox {
										/*width:320px;*/
										border:1px solid #bbb;
										margin:50px;
									}
									.titleBox {
										background-color:#fdfdfd;
										padding:10px;
									}
									.titleBox label{
										color:#444;
										margin:0;
										display:inline-block;
									}

									.commentBox {
										padding:10px;
										border-top:1px dotted #bbb;
									}
									.commentBox .form-group:first-child, .actionBox .form-group:first-child {
										width:80%;
									}
									.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
										width:18%;
									}
									.actionBox .form-group * {
										width:100%;
									}
									.taskDescription {
										margin-top:10px;
									}
									.commentList {
										padding:0;
										list-style:none;
										max-height:500px;
										overflow:auto;
									}
									.commentList li {
										margin:0;
										margin-top:10px;
									}
									.commentList li > div {
										display:table-cell;
									}
									.commenterImage {
										width:40px;
										margin-right:5px;
										height:100%;
										float:left;
									}
									.commenterImage img {
										width:100%;
										border-radius:50%;
									}
									.commentText p {
										margin:0;
									}
									.sub-text {
										color:#aaa;
										font-family:verdana;
										font-size:11px;
									}
									.actionBox {
										border-top:1px dotted #bbb;
										padding:10px;
									}
									.width100{
										width:100% !important;
									}
									.width50{
										width:50% !important;
									}
									.displayflex{
										display: flex !important;
									}
								</style>


								<div class="detailBox">
									<div class="titleBox displayflex">
										<button class=" width50 btn btn-default">Like This Post <span class="badge badge-success">20 Other likes</span></button>
										<button class=" width50 btn btn-default">Dislike This Post <span class="badge badge-danger">20 Other DisLike</span></button>
									</div>
									<div class="titleBox">
										<label>Comment Box</label>
									</div>
									<div class="commentBox justify-content-center">
										<form class="form-inline" role="form">
											<div class="form-group">
												<input class=" width100 form-control" type="text" placeholder="Your comments" />
											</div>
											<div class="form-group">
												<button class=" width100 btn btn-default">Add</button>
											</div>
										</form>
									</div>
									<div class="actionBox">
										<ul class="commentList">
											<li>
												<div class="commenterImage">
													<img src="http://lorempixel.com/50/50/people/9" />
												</div>
												<div class="commentText">
													<p class=""> Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and onHello this is a test comment.<span class="date sub-text">on March 5th, 2014</span></p>

												</div>
											</li>
											<li>
												<div class="commenterImage">
													<img src="http://lorempixel.com/50/50/people/9" />
												</div>
												<div class="commentText">
													<p class=""> Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and onHello this is a test comment.<span class="date sub-text">on March 5th, 2014</span></p>

												</div>
											</li>
											<li>
												<div class="commenterImage">
													<img src="http://lorempixel.com/50/50/people/9" />
												</div>
												<div class="commentText">
													<p class=""> Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and onHello this is a test comment.<span class="date sub-text">on March 5th, 2014</span></p>

												</div>
											</li>
											<li>
												<div class="commenterImage">
													<img src="http://lorempixel.com/50/50/people/9" />
												</div>
												<div class="commentText">
													<p class=""> Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and onHello this is a test comment.<span class="date sub-text">on March 5th, 2014</span></p>

												</div>
											</li>
											<li>
												<div class="commenterImage">
													<img src="http://lorempixel.com/50/50/people/9" />
												</div>
												<div class="commentText">
													<p class=""> Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and onHello this is a test comment.<span class="date sub-text">on March 5th, 2014</span></p>

												</div>
											</li>
											<li>
												<div class="commenterImage">
													<img src="http://lorempixel.com/50/50/people/9" />
												</div>
												<div class="commentText">
													<p class=""> Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and onHello this is a test comment.<span class="date sub-text">on March 5th, 2014</span></p>

												</div>
											</li>
											<li>
												<div class="commenterImage">
													<img src="http://lorempixel.com/50/50/people/9" />
												</div>
												<div class="commentText">
													<p class=""> Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and on Hello this is a test comment and this comment is particularly very long and it goes on and on and onHello this is a test comment.<span class="date sub-text">on March 5th, 2014</span></p>

												</div>
											</li>
											{{--<li>
												<button class="width100">Load Previous Comments</button>
											</li>--}}
										</ul>
									</div>

								</div>
							</section>
					</div>

@endsection