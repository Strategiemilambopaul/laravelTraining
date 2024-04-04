<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class postController extends Controller
{
    public function index()
    {
        $articles = Post::all();

        $videos = Video::all();
 
        return view('articles', compact('articles', 'videos'));
    }
    public function show($id)
    {
        $article= Post::findorFail($id);
        
        
        return view('article', compact('article'));
    }
    public function create(){
        return view('create');
    }
    
    public function store(Request $request){
        // dd($request->all())
        // dd($request->boolean("red"), $request->boolean("blue"));
        // dd($request->avatar->store('images/avatar'));

        $request->validate([
            'tittle'=>['required', 'max:10', 'min:5'],
            'content'=>['required', 'max:400', 'min:30']
        ]);

      
        
        $extension=$request->avatar->extension();
        $filename = time().".".$extension;
        $path=$request->avatar->storeAs(
            'Avatars',
            $filename,
            'public'
        );

        // dd(Storage::download($path));


        $post=Post::create([
            'tittle'=>$request->tittle,
            'content'=>$request->content
        ]);

        $image = new Image();
        $image->name=$filename;
        $image->path = $path;

        // $image->post_id=$post->id;

        $post->image()->save($image);


        
        return to_route('create');
    }
    public function contact()
    {
        return view('contact');
    }
    public function register()
    {
        $post = Post::find(1);
        $video = Video::find(1);

        $comment1 = new Comment(['content'=>'this is my firts comment']);
        $comment2 = new Comment(['content'=>'this is my second comment']);
        $comment3 = new Comment(['content'=>'this is my third comment']);

        $post->comments()->saveMany([
        $comment1,$comment2, $comment3
        ]);

        $comment4 = new Comment(['content'=>'this is my fourth comment']);
        $comment5 = new Comment(['content'=>'this is my fifth comment']);

        $video->comments()->saveMany([
        $comment4,$comment5
        ]);

        // $post->comment()->save($comment1);  

    }
}
