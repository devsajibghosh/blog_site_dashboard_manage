<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\returnSelf;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::paginate(3);
        $trashes = Blog::onlyTrashed()->paginate(5);
        return view('dashboard.blog.blog',compact('blogs','trashes'));
    }
    public function blog_create(){
        $categories = Category::all();
        return view('dashboard.blog.create_blog',compact('categories'));
    }

    function blog_insert(Request $request){

        if($request->hasFile('image')){

            $new_name = auth()->id().time().'.'.$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(400, 400);
            $img->save(public_path('uploads/blogs/'.$new_name), 80);

            Blog::insert([
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'title' => $request->title,
                'image' => $new_name,
                'description' => $request->description,
                'date' => $request->date,
                'created_at' => now(),
            ]);
            return redirect()->route('blog')->with('success','Create at Success');
        }
    }

    // delet blog

    function delete_blog($id){
        Blog::find($id)->delete();
        return back()->with('success','Delete Successfully');
    }

    // restore data

    function restore_blog($id){
        Blog::where('id',$id)->restore();
        return back()->with('success','Restore Successfully');
    }
    // permanently delet
    function force_delete($id){
        Blog::where('id',$id)->forceDelete();
        return back()->with('success','Permanently Deleted Successfully');
    }

}
