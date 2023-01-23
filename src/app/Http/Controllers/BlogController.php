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
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.edit($blog)');

        $blog = \App\Models\Blog::where('id', '=', $blog)->first();
        if ($blog == null) {
            abort(404, "No blog found with that id");
        }

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.edit($blog)');

        return view('edit-blog', ["blog"=>$blog]);
    }

    public function update($id){

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.update($id)');

        $params = request()->all();
        unset($params["_token"]);
        \App\Models\Blog::where('id', '=', $id)->update($params);
        $blogs = \App\Models\Blog::all();

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.update($id)');

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
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.add()');

        $blog = new \App\Models\Blog();

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.add()');

        return view('add-blog', ["blog" => $blog]);
    }

    public function store()
    {

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.store()');

        $blog = new \App\Models\Blog();

        $blog->title = request('title');
        $blog->body = request('body');
        $blog->likes = request('likes') ? request('likes') : 0 ;

        $blog->save();

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.store()');

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
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.view($id)');

        $blog = \App\Models\Blog::where('id', '=', $id)->first();

        if ($blog == null){
            \Log::error(date('[Y-m-d H:i:s] ') . ': ' . ' ERROR: No blog found with ID in BlogController.view($id)');
            abort(404, "No blog found with that id");
        }

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.view($id)');

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
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.like($id)');

        $blog = \App\Models\Blog::where('id', '=', $id)->first();

        if ($blog == null){
            \Log::error(date('[Y-m-d H:i:s] ') . ': ' . ' ERROR: No blog found with ID in BlogController.like($id)');
            abort(404, "No blog found with that id");
        }

        $blog->likes += 1;

        $blog->save();

        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.like($id)');

        return view('view-blog', ["blog"=>$blog]);
    }

    public function delete($blog)
    {
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.delete($blog)');
        \App\Models\Blog::where('id', '=', $blog)->delete();
        $blogs = \App\Models\Blog::all();
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.delete($blog)');

        return view('list-blog', ["blogs" => $blogs]);
    }
    public function list()
    {
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD ENTER BlogController.list()');
        $blogs = \App\Models\Blog::all();
        \Log::notice(date('[Y-m-d H:i:s] ') . ': ' . ' METHOD EXIT BlogController.list()');

        return view('list-blog', ["blogs" => $blogs]);

    }
}
