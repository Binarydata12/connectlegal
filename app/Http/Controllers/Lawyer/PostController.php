<?php

namespace App\Http\Controllers\Lawyer;

use App\Events\PostComment;
use App\Events\PostRealtime;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{
    public function store(Request $request) {
        $this->validate(request(), [
            'title'   => 'required|unique:posts',   
        ]);

        $post = Post::create([
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'description'   => $request->description,
            'slug'          => Str::slug($request->title)
        ]);
        event(new PostComment($post->slug, 'post'));
        return redirect()->route('lawyer.community')->with('success','Your post has been successfully added!');
    }

    public function addComment(Request $request, $id) {
        $this->validate(request(), [
            'comment'   => 'required',   
        ]);
        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $id,
            'comment' => $request->comment
        ]);
        event(new PostComment($comment, 'comment'));
        if($request->page === "group") {
            return redirect()->route('lawyer.community.group.feed', $request->group)->with('success','Your comment has been successfully added!');
        }else {
            return redirect()->route('lawyer.community')->with('success','Your comment has been successfully added!');
        }
    }

    public function updatedPost(Request $request) {
        $postSlug = $request->data;
        $post = Post::whereSlug($postSlug['postComment'])->first();
        $latestPost = (string) view('lawyer.post-updated',  compact('post'));        
        return $latestPost;
    }
    
    public function updatedComment(Request $request) {
        $comment = $request->data;

        $comments = Comment::wherePostId($comment['postComment']['post_id'])
        ->orderBy('created_at', 'DESC')
        ->get();
        $finalComments = (string) view('lawyer.comment-updated',  compact('comments'));        
        return ['comments' => $finalComments, 'count' => $comments->count()];
    }

}
