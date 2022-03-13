<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateSearchPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Services\PostService;
use App\model\Post;
use App\model\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function getPosts()
    {
        return PostService::getPosts();
    }

    public function getPost($slug)
    {
        return PostService::getPost($slug);
    }

    public function searchPosts(CreateSearchPostRequest $request)
    {
        return PostService::searchPosts($request);
    }

    public function savePost(CreatePostRequest $request)
    {
        return PostService::createPost($request);
    }

    public function updatePost(UpdatePostRequest $request, $id)
    {
        return PostService::updatePost($id, $request);
    }

    public function deletePost($id)
    {
        return PostService::deletePost($id);
    }

    public function restorePost($id)
    {
        return PostService::restoreDeletedPost($id);
    }
}
