<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware("auth")->except(["index","show"]);
    }
    public function index()
    {
        $posts = Post::latest()->paginate(9);

        return view("posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => "required|max:150|min:10",
            'body'=>"required|min:30|max:3000",
            'image'=>"image|mimes:png,jpg,jpeg",
            'tags' =>"nullable|string"


        ]);
        $formFields['user_id'] =  Auth::id();
        if($request->hasFile("image")){
            $formFields['image'] = $request->file("image")->store("posts","public");

        }
        $post =Post::create($formFields);
        if ($request->tags) {
        $tags = explode(',', $request->tags);
        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag->id);
        }
    }
        return to_route("posts.index")->with("success","added..!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update',$post);
        $tags = $post->tags()->pluck('name')->implode(', ');
        return view("posts.edit",compact("post","tags"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update',$post);
        $formFields = $request->validate([
            'title' => "required|max:150|min:10",
            'body'=>"required|min:30|max:3000",
            'image'=>"image|mimes:png,jpg,jpeg",
            'tags' => "nullable|string"


        ]);
        if($request->hasFile("image")){
        $formFields['image'] = $request->file("image")->store("posts","public");
        }
        $post->fill($formFields)->save();

        if ($request->tags) {
            $tags = explode(',', $request->tags); // Split tags by comma

            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }

            $post->tags()->sync($tagIds);
        }

        return to_route("posts.index")->with("success","updated..!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete',$post);


        $post->delete();
        return to_route("posts.index")->with("success","deleted...1");
    }

    public function postByUser(User $user){
        //dd($user->id);
        $posts = Post::where("user_id",$user->id)->get();

        //dd($posts);
        return view("posts.myposts",compact("posts"));
    }
}
