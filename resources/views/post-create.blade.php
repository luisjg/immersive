@error('title')
    {{ $message }}
@enderror

@error('body')
    {{ $message }}
@enderror

<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="body" placeholder="Body">
    <button type="submit">Submit</button>
</form>
