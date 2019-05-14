@extends('layouts.app')

@section('content')

	@include('partials.header')
	@include('partials.nav')
	<!-- Main -->


	<div id="main">

		<!-- Featured Post -->
		<article class="post featured">
			<header class="major">
				<span class="date">{{\Illuminate\Support\Carbon::today()}}</span>
				<h2>Add Post</h2>
			</header>
				<section>
					<form method="post" action="#">
						<div class="fields">
							<div class="field">
								<label for="name">Image</label>
								<input required type="file" name="name" id="name" />
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

		<ul class="nav justify-content-center">
			<li class="nav-item">
				<a class="nav-link active" href="#">My Posts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="#">All Posts</a>
			</li>
		</ul>
		<!-- Posts -->
		<section class="posts">
			<article>
				<header>
					<span><img src="{{asset('images/pic02.jpg')}}" alt="" style="height: 70px; width: 70px; border-radius: 100%; " /> <br> <span class="date"> Noman Kabeer <br> April 24, 2017</span></span>
					<h3><a href="#">Sed magna</a></h3>
				</header>
				<a href="#" class="image fit"><img src="{{asset('images/pic02.jpg')}}" alt="" /></a>
				<ul class="actions special">
					<li><a href="#" class="button">Full Story</a></li>
				</ul>
			</article>
			<article>
				<header>
					<span class="date">April 22, 2017</span>
					<h2><a href="#">Primis eget<br />
							imperdiet lorem</a></h2>
				</header>
				<a href="#" class="image fit"><img src="{{asset('images/pic03.jpg')}}" alt="" /></a>
				<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
				<ul class="actions special">
					<li><a href="#" class="button">Full Story</a></li>
				</ul>
			</article>
			<article>
				<header>
					<span class="date">April 18, 2017</span>
					<h2><a href="#">Ante mattis<br />
							interdum dolor</a></h2>
				</header>
				<a href="#" class="image fit"><img src="{{asset('images/pic04.jpg')}}" alt="" /></a>
				<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
				<ul class="actions special">
					<li><a href="#" class="button">Full Story</a></li>
				</ul>
			</article>
			<article>
				<header>
					<span class="date">April 14, 2017</span>
					<h2><a href="#">Tempus sed<br />
							nulla imperdiet</a></h2>
				</header>
				<a href="#" class="image fit"><img src="{{asset('images/pic05.jpg')}}" alt="" /></a>
				<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
				<ul class="actions special">
					<li><a href="#" class="button">Full Story</a></li>
				</ul>
			</article>
			<article>
				<header>
					<span class="date">April 11, 2017</span>
					<h2><a href="#">Odio magna<br />
							sed consectetur</a></h2>
				</header>
				<a href="#" class="image fit"><img src="{{asset('images/pic06.jpg')}}" alt="" /></a>
				<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
				<ul class="actions special">
					<li><a href="#" class="button">Full Story</a></li>
				</ul>
			</article>
			<article>
				<header>
					<span class="date">April 7, 2017</span>
					<h2><a href="#">Augue lorem<br />
							primis vestibulum</a></h2>
				</header>
				<a href="#" class="image fit"><img src="{{asset('images/pic07.jpg')}}" alt="" /></a>
				<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
				<ul class="actions special">
					<li><a href="#" class="button">Full Story</a></li>
				</ul>
			</article>
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