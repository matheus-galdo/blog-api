<?php

namespace App\Http\Services;

use App\Exceptions\DuplicatedPostException;
use App\Exceptions\PostNotFoundException;
use App\Http\Repositories\PostRepository;
use Illuminate\Support\Str;

class PostService
{
    public static function getPosts()
    {
        return PostRepository::getPosts();
    }

    public static function getPost($slug)
    {
        $post = PostRepository::getPostBySlug($slug);
        if (empty($post)) {
            throw new PostNotFoundException;
        }

        return $post;
    }

    public static function searchPosts($request)
    {
        return PostRepository::searchPosts($request->search);
    }

    public static function createPost($request)
    {
        $slug = Str::slug($request->title);

        $anotherPost = PostRepository::getPostBySlug($slug);
        if (!empty($anotherPost)) {
            throw new DuplicatedPostException();
        }

        return PostRepository::createPost($slug, $request);
    }

    public static function updatePost($id, $request)
    {
        $post = PostRepository::getPostById($id);     
        $slug = Str::slug($request->title);
        $postWithSameSlug = PostRepository::getPostBySlug($slug);     
        
        if (!empty($postWithSameSlug) && ($postWithSameSlug->id != $id)) {
            throw new DuplicatedPostException();
        }

        return PostRepository::updatePost($post, $slug, $request);
    }

    public static function deletePost($id)
    {
        return PostRepository::deletePost($id);
    }

    public static function restoreDeletedPost($id)
    {
        return PostRepository::restoreDeletedPost($id);
    } 
}
