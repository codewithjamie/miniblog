<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Posts;
use RealRashid\SweetAlert\Facades\Alert;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $posts = Posts::where('author_id', $user->id)->get();
        return view('posts.all')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'permalink' => [
                'required',
                'string',
                'max:255',
                'regex:/^\/?[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*$/',
            ],
            'image' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);


        $defaultImagePath = 'https://ultranews.thesky9.com/vendor/core/core/base/images/placeholder.png';


        if ($request->hasFile('image')) {

            $uploadedFile = $request->file('image');

            $disk = 'public';

            // Store the image using Laravel Storage
            $path = $uploadedFile->store('posts', $disk);
        } else {
            $path = $defaultImagePath;
        }

        $new_post = new Posts();
        $new_post->title = $request->title;
        $new_post->permalink = $request->permalink;
        $new_post->description = $request->description;
        $new_post->author_id = $user->id;
        $new_post->content = $request->content;
        $new_post->is_featured = 0;
        $new_post->status = 'published';
        $new_post->published_at = \Carbon\Carbon::now();
        $new_post->image =  $path;
        $new_post->save();

        toast('Your Post as been submited!','success');

        return redirect()->route('posts.all');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($permalink)
    {
        $post = Posts::where('permalink', $permalink)->firstOrFail();

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if ($request->hasFile('image')) {

            $uploadedFile = $request->file('image');

            $disk = 'public';

            // Store the image using Laravel Storage
            $path = $uploadedFile->store('posts', $disk);

            // Create new post record
            Posts::where('id', $id)->update([
                'title' => $request->title,
                'permalink' => $request->permalink,
                'description' => $request->description,
                'content' => $request->content,
                'image' => $path
            ]);

            toast('Your Post as been updated!','success');

            return redirect()->route('posts.all');

        } else {
            Posts::where('id', $id)->update([
                'title' => $request->title,
                'permalink' => $request->permalink,
                'description' => $request->description,
                'content' => $request->content,
            ]);

            toast('Your Post as been updated!','success');

            return redirect()->route('posts.all');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::where('id', $id)->delete();

        toast('Your Post as been deleted!','success');

        return redirect()->back();
    }
}
