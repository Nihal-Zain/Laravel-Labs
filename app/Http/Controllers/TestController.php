<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\Tag as SpatieTag;
class TestController extends Controller
{
    public function index(){
        $posts=Post::with(['tags','user'])->withTrashed()->paginate(10); //select * from posts
        return view('posts.index',compact('posts'));
    }
    public function show($id){
        $post = Post::with('comments')->find($id);
        return view('posts.show',compact('post'));
    }
    public function create(){
        $users=User::all();
        return view('posts.create',compact('users'));
    }
    public function store(StorePostRequest $request){
        $title=$request->title;
        $description=$request->description;
        $creator = $request->creator;
        if($request->hasFile('image')){
            $image=$request->file('image')->store('posts','public');
        }else{
            $image=null;
        }
        $post=Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$creator,
            'image'=>$image,
            'created_at'=>now() 
        ]);
        if($request->tags){
            $post->syncTags($request->tags);
        }
        return redirect()->route('posts.index');
    }
    public function edit($id){
        $post=Post::find($id);
        $users=User::all();
        return view('posts.edit',['post'=>$post,'users'=>$users]);
    }
    public function update(StorePostRequest $request,$id){
        $post=Post::find($id);
        $image=null;
        if($request->hasFile('image')){
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $image = $request->file('image')->store('posts', 'public');
            $post->image = $image; 
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->creator,
            'image'=>$image,
        ]);
        if($request->tags){
            $post->syncTags($request->tags);
        }
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
    public function restore($id){
        $post=Post::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('posts.index')->with('success','Post restored successfully');
    }
    public function comments(Post $post){
        $comments = $post->comments;
        return view('posts.show',compact('comments'));
    }


}
