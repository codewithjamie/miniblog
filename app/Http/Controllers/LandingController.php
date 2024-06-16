<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\FavoritePosts;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LandingController extends Controller
{
    public function index() {
        $getPosts = Posts::latest()->take(5)->get();

        return view('welcome')
            ->with('getPosts', $getPosts);

    }

    public function getAuthor(Request $request, $author_id) {
        $author = User::where('id', $author_id)->first();

        return view('author')
            ->with('author', $author);

    }

    public function homePost(Request $request, $permalink) {
        $posts = Posts::where('permalink', $permalink)->first();

        if (!$posts) {
            return redirect()->back()->withErrors(['Post not found.']);
        }

        $commentCount = Comments::where('post_id', $posts->id)->count();
        $getLikes = FavoritePosts::where('post_id', $posts->id)->count();
        $getComments = Comments::where('post_id', $posts->id)->get();

        return view('post-details')
            ->with('posts', $posts)
            ->with('getLikes', $getLikes)
            ->with('commentCount', $commentCount)
            ->with('getComments', $getComments);
    }

    public function postComment(Request $request) {
        $user = Auth::user();

        Comments::create([
            'comment' => $request->message,
            'post_id' => $request->post_id,
            'author_id' => $request->author_id,
            'user_id' => $user->id
        ]);


        toast('commented on post!','success');

        return redirect()->back();
    }

    public function likePost(Request $request, $post_id) {
        $user = Auth::user();

        FavoritePosts::create([
            'post_id' => $post_id,
            'user_id' => $user->id,
            'type' => 'like'
        ]);

        toast('post liked', 'sucess');

        return redirect()->back();
    }

    public function searchPost(Request $request) {

        $request->validate([
            'query' => 'required|min:3'
        ]);

        $query = $request->input('query');

        $posts = Posts::where('title', 'like', '%' . $query . '%')
                ->latest()
                ->paginate(10);

        return view('search')
            ->with('query', $query)
            ->with('posts', $posts);
    }
}
