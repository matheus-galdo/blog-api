<?php

namespace App\Http\Controllers;

use App\model\Post;
use App\model\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function getPosts()
    {
        return Post::orderBy('id', 'DESC')->get();
    }

    public function getPost($slug)
    {
        if ($post = Post::where('slug', $slug)->first()) {
            $post->user;
           return $post;
        }

        $result =  ["result" => false, "msg" => "noticia não encontrada"];
        return $result;
    }


    public function savePost(request $request)
    {
        $slug = Str::slug($request->title);
        
        $anotherPost = Post::where('slug', $slug)->first();      
        if (!empty($anotherPost)) {
            throw new Exception("A post already exist with this title", 1);
        }

        $post = new Post([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'content' => $request->content,
            'author' => 1
        ]);

        $post->save();
        return $post;
    }

    public function updatePost(request $request, $id)
    {
        $post = Post::findOrFail($id);     

        $slug = Str::slug($request->title);
        $anotherPost = Post::where('slug', $slug)->first();      
        if (!empty($anotherPost)) {
            throw new Exception("A post already exist with this title", 1);
        }

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'content' => $request->content,
            'author' => 1
        ]);

        $post->save();
        return $post;
    }

    public function deletePost($id)
    {
        Post::destroy($id);
        return 'deleted Post '.$id;
    }
}
