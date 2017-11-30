@extends('template.main')

@section('content')
	<!-- GIT Test 2 GG Cyne -->
	<div class = "panel">
		<div class = "panel-body">
			<form id = "form_post" role = "form" method = "POST" action = "{{ action('PostController@store') }}">
				<input name = "_token" type = "hidden" value = "{{ csrf_token() }}">
				<input name = "content" class = "no-border" placeholder = "add post ...">
				<input name = "username" class = "no-border" placeholder = "name ..." style = "width: 200px; text-align: center">
			</form>
		</div>
	</div>

	@foreach ($posts as $post)
	<div id = "post" class = "panel panel-post">
		<div class = "panel-body">
			<h5><b> {{ $post->username }} </b></h5>
			<p> {{ $post->content }} </p>
			<p class = "date"> {{ $post->created_at->format('m/d H:ia') }} </p>
			<br>
			<div class = "row">
				<form class = "form_comment" role = "form" method = "POST" action = "{{ action('CommentController@store') }}">
					<div class = "col-sm-12">
						<input name = "content" class = "no-border" placeholder = "add comment ...">
						<input name = "username" class = "no-border" placeholder = "name ..." style = "width: 200px">
					</div>

					<input name = "_token" type = "hidden" value = "{{ csrf_token() }}">
					<input name = "post_id" type = "hidden" value = "{{ $post->id }}">
				</form>
			</div>
			<br>
			@if (count($post->comments) > 0)
				<p class = "comment"> Comments </p>

				@foreach ($post->comments->sortBy('created_at') as $comment)
					<p class = "comment"> <b>{{ $comment->username }}: </b> {{ $comment->content }} </p>
					<p class = "date"> {{ $comment->created_at->format('m/d H:ia') }} </p>
				@endforeach
			@endif
		</div>
	</div>
	@endforeach

	{{ $posts->links() }}

	<script>
		$('input').keydown(function(e) {
		    if (e.keyCode == 13) {
		        $(this).closest('form').submit();
		    }
		});

		$('.form_comment').on('submit', function(e) {
	        e.preventDefault();
	        $.ajax({
	            type: $(this).attr('method'),
	            url: $(this).attr('action'),
	            data: $(this).serialize(),
	            success: function (data) {
	                $("body").html(data);
	            }
	        });
	    });

	    $('#form_post').on('submit', function(e) {
	        e.preventDefault();
	        $.ajax({
	            type: $(this).attr('method'),
	            url: $(this).attr('action'),
	            data: $(this).serialize(),
	            success: function (data) {
	                $("body").html(data);
	            }
	        });
	    });
	</script>
@endsection