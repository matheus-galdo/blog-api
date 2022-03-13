<?php

namespace App\Http\Repositories;

use App\Model\Post;

class PostRepository {
    public static function getPosts()
    {
        return Post::with('categories')->orderBy('id', 'DESC')->get();
    }

    public static function getPostBySlug($slug)
    {
        return Post::with('categories')->where('slug', $slug)->first();
    }

    public static function searchPosts($searchTerm)
    {
        return Post::with('categories')
            ->where('title', 'LIKE', "%{$searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$searchTerm}%")
            ->get();
    }

    public static function getPostById($id)
    {
        return Post::with('categories')->findOrFail($id);
    }

    public static function createPost($slug, $request)
    {        
        $post = new Post([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'content' => $request->content,
            'user_id' => UserRepository::getMainUser()->id
        ]);

        $post->save();
        return $post;
    }

    public static function updatePost(Post $post, $slug, $request){
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

    public static function deletePost($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        if($post->trashed()){
            $post->forceDelete();
        }else{
            $post->delete();
        }
    }


    public static function restoreDeletedPost($id)
    {
        $post = Post::with('categories')->withTrashed()->findOrFail($id);

        if($post->trashed()){
            $post->restore();
        }

        return $post;
    }
}
