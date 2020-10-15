<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Mail\BlogPublishStatus;
use App\Mail\BlogHasPublished;
use Auth;
use App\User;
use Mail;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::with('user')->get();

        return view('pages.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = Blog::create([
            "title" => $request["title"],
            "content" => $request["content"],
            "status" => $request['status'],
            "user_id" => Auth::id()
        ]);

        // saya coba menggunakan cc tidak bisa jadi saya buat 2 kali

        Mail::to(User::findOrFail(Auth::id())->email)
            ->send(new BlogPublishStatus($blog));

        Mail::to('editor@editor.com')
            ->send(new BlogPublishStatus($blog));
        return redirect('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blog::with('user')->findOrFail($id);
        return view('pages.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::findOrFail($id);
        return view('pages.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->update([
            "title" => $request['title'],
            "content" => $request["content"],
            "status" => $request["status"]
        ]);

        $blog = Blog::where('id', $id)->get();

        if(Blog::findOrFail($id)->status == 1){
            Mail::to(User::findOrFail(Auth::id())->email)
            ->send(new BlogHasPublished($blog));
            return redirect('blog');
        }

        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect('blog');
    }
}
