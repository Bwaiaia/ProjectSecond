<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller {
 
  public function index() {
   
    $posts = Post::orderBy('id', 'desc')->paginate(1000);
    return view('admin.post.index', ['posts' => $posts]);
  }

 
  public function create() {
   
    return view('admin.post.create');
  }

 
  public function store(Request $request) {
    $request->validate([
      'employee' => 'required',
      'passport_type' => 'required',
      'passport_num' => 'required',
      'issue_date' => 'required',
      'expiry_date' => 'required',
       'comment' => 'required',
      // 'title' => 'required',
      // 'category' => 'required',
      // 'content' => 'required|min:50',
      'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time() . '.' . $request->file->extension();
    // $request->image->move(public_path('images'), $imageName);
    $request->file->storeAs('public/images', $imageName);

    $postData = [
      'employee' => $request->employee,
      'passport_type' => $request->passport_type,
      'passport_num' => $request->passport_num,
      'issue_date' => $request->issue_date,
      'expiry_date' => $request->expiry_date, 
      'comment' => $request->comment,
      // 'title' => $request->title, 
      // 'category' => $request->category, 
      // 'content' => $request->content, 
      'image' => $imageName];

    Post::create($postData);
    return redirect('/post')->with(['message' => 'Post added successfully!', 'status' => 'success']);
  }

  
  public function show(Post $post) {
    return view('admin.post.show', ['post' => $post]);
  }

 
  public function edit(Post $post) {
    
    
    return view('admin.post.edit', ['post' => $post]);
  }

  
  public function update(Request $request, Post $post) {
    $imageName = '';
    if ($request->hasFile('file')) {
      $imageName = time() . '.' . $request->file->extension();
      $request->file->storeAs('public/images', $imageName);
      if ($post->image) {
        Storage::delete('public/images/' . $post->image);
      }
    } else {
      $imageName = $post->image;
    }

    $postData = [
      'employee' => $request->employee,
      'passport_type' => $request->passport_type,
      'passport_num' => $request->passport_num,
      'issue_date' => $request->issue_date,
      'expiry_date' => $request->expiry_date, 
      'comment' => $request->comment,
      // 'title' => $request->title, 
      // 'category' => $request->category, 
      // 'content' => $request->content, 
      'image' => $imageName];

    $post->update($postData);
    return redirect('/post')->with(['message' => 'Post updated successfully!', 'status' => 'success']);
  }

  
  public function destroy(Post $post) {
    Storage::delete('public/images/' . $post->image);
    $post->delete();
    return redirect('/post')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
  }

  public function massDestroy(MassDestroyPostRequest $request)
  {
    $post = Post::find(request('ids'));

    foreach ($post as $post)
    {
      $post->delete();
    }

    return response(null, Response::HTTP_NO_CONTENT);
  }
}