<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;

class BlogController
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $blog
     * @return \Illuminate\View\View
     */
    public function edit($blog)
    {
        $blog = \App\Models\Blog::where('id', '=', $blog)->first();
        if ($blog == null) {
            abort(404, "No blog found with that id");
        }
        return view('edit-blog', ["blog"=>$blog]);
    }

    public function update($id){
        $params = request()->all();
        unset($params["_token"]);
        \App\Models\Blog::where('id', '=', $id)->update($params);
        $blogs = \App\Models\Blog::all();
        return view('list-blog', ["blogs" => $blogs]);
    }
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function add()
    {
        $blog = new \App\Models\Blog();

        return view('add-blog', ["blog" => $blog]);
    }

    public function store()
    {
        $blog = new \App\Models\Blog();

        $blog->title = request('title');
        $blog->body = request('body');
        $blog->likes = request('likes') ? request('likes') : 0 ;

        $blog->save();
        return $this->list();
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $blog
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $blog = \App\Models\Blog::where('id', '=', $id)->first();

        if ($blog == null){
            abort(404, "No blog found with that id");
        }
        return view('view-blog', ["blog"=>$blog]);
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $blog
     * @return \Illuminate\View\View
     */
    public function like($id)
    {
        $blog = \App\Models\Blog::where('id', '=', $id)->first();

        if ($blog == null){
            abort(404, "No blog found with that id");
        }

        $blog->likes += 1;

        $blog->save();

        return view('view-blog', ["blog"=>$blog]);
    }

    public function delete($blog)
    {
        \App\Models\Blog::where('id', '=', $blog)->delete();
        $blogs = \App\Models\Blog::all();
        return view('list-blog', ["blogs" => $blogs]);
    }
    public function list()
    {

        $blogs = \App\Models\Blog::all();
        return view('list-blog', ["blogs" => $blogs]);
    }
}
