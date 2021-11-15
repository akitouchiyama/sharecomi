<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function add()
    {
      return view('posts.create');
    }

    public function create(Post $post, Request $request)
    {
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`test`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('test', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);

      $post->save();

      return redirect('posts/create');
    }
}
