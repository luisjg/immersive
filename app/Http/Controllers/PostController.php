<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\PostComment;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        $request->validate($rules);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body
            ]);

        UserPost::create([
            'user_id' => 1,
            'post_id' => $post->id
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('author', 'comments');
        return view('post-show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        $request->validate($rules);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts');
    }

    public function storeComment(Request $request)
    {
        $rules = [
            'comment' => 'required'
        ];

        $request->validate($rules);

        $comment = Comment::create([
            'body' => $request->comment
        ]);

        PostComment::create([
            'post_id' => $request->post_id,
            'comment_id' => $comment->id
        ]);

        return redirect()->route('posts.show', $request->post_id);
    }
}
