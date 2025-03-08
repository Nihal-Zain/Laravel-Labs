<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $posts=[
            ['id'=>1,'title'=>'Post 1','author'=>'John Doe','created_at'=>'2023-01-01'],
            ['id'=>2,'title'=>'Post 2','author'=>'Jane Smith','created_at'=>'2023-01-02'],
            ['id'=>3,'title'=>'Post 3','author'=>'Alice Johnson','created_at'=>'2023-01-03']
        ];
        return view('posts.index',['posts'=>$posts]);
    }
    public function show($id){
    $posts=[
            ['id'=>1, 'title'=>'Post 1','description'=>'Description 1','postedBy'=>['name'=>'John Doe','email'=>'john@gmail.com','createdAt'=>'2023-01-01'],'created_at'=>'2023-01-01'],
            ['id'=>2, 'title'=>'Post 2','description'=>'Description 2','postedBy'=>['name'=>'Jane Smith','email'=>'jane@gmail.com','createdAt'=>'2023-01-02'],'created_at'=>'2023-01-02'],
            ['id'=>3, 'title'=>'Post 3','description'=>'Description 3','postedBy'=>['name'=>'Alice Johnson','email'=>'alice@gmail.com','createdAt'=>'2023-01-03'],'created_at'=>'2023-01-03']
        ];
        $post = collect($posts)->firstWhere('id', $id);
        return view('posts.show',['post'=>$post]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(){
        $title=request()->title;
        $description=request()->description;
        $name=request()->name;
        dd($title,$description,$name);
        //return view('posts\show',['title'=>$title,'description'=>$description]);
    }
    public function edit($id){
        $posts=[
            ['id'=>1, 'title'=>'Post 1','description'=>'Description 1','postedBy'=>['name'=>'John Doe','email'=>'john@gmail.com','createdAt'=>'2023-01-01'],'created_at'=>'2023-01-01'],
            ['id'=>2, 'title'=>'Post 2','description'=>'Description 2','postedBy'=>['name'=>'Jane Smith','email'=>'jane@gmail.com','createdAt'=>'2023-01-02'],'created_at'=>'2023-01-02'],
            ['id'=>3, 'title'=>'Post 3','description'=>'Description 3','postedBy'=>['name'=>'Alice Johnson','email'=>'alice@gmail.com','createdAt'=>'2023-01-03'],'created_at'=>'2023-01-03']
        ];
        $post = collect($posts)->firstWhere('id', $id);
        return view('posts.edit',['post'=>$post]);
    }
    public function update($id){
        $title=request()->title;
        $description=request()->description;
        $name=request()->name;
        dd($title,$description,$name);
    }

    public function destroy($id){
        dd($id);
    }
}
