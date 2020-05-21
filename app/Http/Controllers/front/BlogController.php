<?php

namespace App\Http\Controllers\front;

use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public  function  single($id)
    {
        $blog = Blog::find($id);
        $blog->update([
            'view'=>$blog->view + 1
        ]);

        return view('front.blog.single',compact('blog'));
    }



    public  function  blogs()
    {
        $blogs = Blog::Filter()->latest()->paginate(12);

        foreach ($blogs as $blog)
        {
            $arr = [];
            $category = \App\CategoryForBlog::find($blog->category->id);
            $category = Category::find($category->category_id);

            $parent = \App\CategoryForBlog::where('id' , $blog->category->parent_id)->first();
            if ($parent)
            {
                $arr[0] = $category->name;
                $arr[1] = $parent->name;
                $arr[2] = $blog->category->name;
                $blog['related'] = $arr;
            }
            else
            {

                $arr[0] = $category->name;
                $arr[1] = $blog->category->name;
                $blog['related'] = $arr;
            }
            unset($blog['category']);
        }

        //return $blogs;
        return view('front.blog.blogs',compact('blogs'));
    }

}
