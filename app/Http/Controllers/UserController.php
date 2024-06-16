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
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function dashboard() {

        $user = Auth::user();

        $postsCount = Posts::select('id')->where('author_id', $user->id)->count();
        $commentsCount = Comments::select('id')->where('user_id', $user->id)->count();
        $favoriteCounts = DB::table('favorite_posts')
                        ->select(DB::raw('COUNT(DISTINCT user_id) as favorited_users_count'))
                        ->join('posts', 'favorite_posts.post_id', '=', 'posts.id')
                        ->where('posts.author_id', $user->id)
                        ->count();

        $getPosts = Posts::where('author_id', $user->id)->get();

        return view('dashboard')
            ->with('postsCount', $postsCount)
            ->with('commentsCount', $commentsCount)
            ->with('favoriteCounts', $favoriteCounts)
            ->with('getPosts', $getPosts);


    }

    public function posts(Request $request) {
        return view('posts');
    }

    public function comm(Request $request) {

        $getCommentList = Comments::where('author_id', '!=', Auth::user()->id)->latest()->get();
        return view('comments')->with('getCommentList', $getCommentList);
    }

    public function delComm(Request $request, $id) {

        Comments::where('id', $id)->delete();

        toast('comment deleted!','success');

        return redirect()->back();
    }

    public function signout(Request $request) {
        Session::flush();

        Auth::logout();

        toast('logged out!','success');

        return redirect()->route('welcome');
    }


}
