<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'users' => User::paginate(10),
        'posts' => Post::all(),
    ]);
});

Route::post('/contact', function (Request $request) {
    $contact = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ]);

    Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));

    return back()->with('success_message', 'We received your message successfully and will get back to you shortly!');
});

// return a post
Route::get('/post/{post}', function (Post $post) { return view('post.show', [
        'post' => $post,
    ]);
})->name('post.show');

// edit a post
Route::get('/post/{post}/edit', function (Post $post) {
   return view('post.edit', [
        'post' => $post
   ]);
})->name('post.edit');

// Patch post model with update
Route::patch('/post/{post}', function (Request $request, Post $post) {

    /** run validation */
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'photo' => 'nullable|sometimes|image|max:5000',
    ]);

    /** call post update method */
    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'photo' => $request->photo ? $request->file('photo')->store('photos', 'public') : $post->photo,
    ]);

    return back()->with('success_message', 'Post was updated successfully!');
})->name('post.update');

// comment on a post
Route::post('/post/{post}/comment', function (Request $request, Post $post) {
    $request->validate([
        'comment' => 'required|min:4'
    ]);

    Comment::create([
        'post_id' => $post->id,
        'username' => 'Guest',
        'content' => $request->comment,
    ]);

    return back()->with('success_message', 'Comment was posted!');
})->name('comment.store');
