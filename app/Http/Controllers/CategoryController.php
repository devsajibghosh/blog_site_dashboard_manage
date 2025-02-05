<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\str;

class CategoryController extends Controller
{
 public function categories(){
    $categories = Category::paginate(2);
    return view('dashboard.category.category',compact('categories'));
 }

//  insert table data of category

public function insert(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image',

    ]);

    $new_name = auth()->id().'-'.$request->title.'-'.now()->format('M-d-Y').'.'.$request->file('image')->getClientOriginalExtension();

    $img = Image::make($request->file('image'))->resize(300, 200);
    $img->save(base_path('public/uploads/category/'.$new_name), 80);

    try {
        if ($request->hasFile('image')) {
            $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

            Category::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $slug,
                'image' => $new_name,
                'created_at' => now(),
            ]);

            return back()->with('insert_success', "Insert Successful");
        }
    } catch (QueryException $e) {
        if ($e->errorInfo[1] == 1062) {
            // Duplicate entry error
            $errorMessage ="This slug already exits.Choose a Different Slug";
            return back()->with('error', $errorMessage);
        } else {
            // Other error
            $errorMessage = "An error occurred: " . $e->getMessage();
            return back()->with('error', $errorMessage);
        }
    }
}

    // delet data

    public function delete($id){
        Category::findOrFail($id)->delete();
        return back();
    }

    // chnage status

    public function status($id){
        $category = Category::where('id',$id)->first();

        if($category->status == 'active'){
            Category::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back();
        }else{
            Category::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back();
        }
    }

    // edited area

    public function edit_view($slug){
        $category = Category::where('slug',$slug)->first();
        return view('dashboard.category.edit',compact('category'));
    }

    public function category_edit(Request $request,$id){
        $category = Category::where('id',$id)->first();

        if($request->hasFile('image')){

            unlink(public_path('uploads/category/'.$category->image));

            $new_name = $category->id.time().'.'.$request->file('image')->getClientOriginalExtension();

            $img = Image::make($request->file('image'))->resize(300, 200);
            $img->save(public_path('uploads/category/'.$new_name), 80);

            if($request->slug){
                Category::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => Str::slug($request->slug),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
                return redirect()->route('category')->with('insert_success',"Update Successful");
            }else{
                Category::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => Str::slug($request->title),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
                return redirect()->route('category')->with('insert_success',"Update Successful");
            }
        }else{
            if($request->slug){
                Category::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => Str::slug($request->slug),
                    'created_at' => now(),
                ]);
                return redirect()->route('category')->with('insert_success',"Update Successful");
            }else{
                Category::find($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => Str::slug($request->title),
                    'created_at' => now(),
                ]);
                return redirect()->route('category')->with('insert_success',"Update Successful");
            }
        }

    }

}

