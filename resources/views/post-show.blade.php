<h1>{{ $post->title }}</h1>
<small>by: {{ $post->author[0]->username }}</small>
<p>{{ $post->body }}</p>

<p><a href="{{ route('posts.edit', $post) }}">Edit post</a></p>

<form method="post" action="{{ route('posts.destroy', $post) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

<h3>Comments Section</h3>

@if($post->comments)
    @foreach($post->comments as $comment)
        <p>{{ $comment->body }}</p>
    @endforeach
@endif

<form method="post" action="{{ route('comment.create') }}">
    @csrf
    <input type="text" name="comment" placeholder="Add your comment here.">
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <button type="submit">Submit</button>
</form>
