@error('title')
    {{ $message }}
@enderror

@error('body')
    {{ $message }}
@enderror

<form method="post" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $post->title }}">
    <input type="text" name="body" value="{{ $post->body }}">
    <button type="submit">Submit</button>
</form>
