<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class MyBlogController extends Controller
{
    public function index(){
        $blogdata = BlogModel::orderBy('created_at', 'DESC')->paginate(3)->onEachSide(2);
        return view('my_blog', ['blogdata' => $blogdata]);
    }
}
