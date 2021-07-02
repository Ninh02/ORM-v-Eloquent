<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogModel::all();
        return view('Blog.list',compact('blogs'));
    }

    public function create()
    {
        return view('Blog.create');
    }

    function store(Request $request){
        $blog = new BlogModel();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->time = $request->input('time');
        $blog->save();
        session::flash('success','Them moi  thành công');
        return redirect()->route('blogs.index');
    }

    public function update(Request $request,$id)
    {
        $blog = BlogModel::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->time = $request->input('time');
        $blog->save();
        session::flash('success','Chinh sua thành công');
        return redirect()->route('blogs.index');
    }

    public function edit($id)
    {
        $blog = BlogModel::findOrFail($id);
        return view('Blog.edit',compact('blog'));
    }

    public function delete($id)
    {
        $blog = BlogModel::findOrFail($id);
        $blog->delete();
        session::flash('success','xóa thành công');
        return redirect()->route('blogs.index');
    }
}
