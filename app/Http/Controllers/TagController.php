<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    function tags(){
        $tags = Tag::paginate(2);
        $trashes = Tag::onlyTrashed()->paginate(5);
        return view('dashboard.tag.tag',compact('tags','trashes'));
    }

    function tags_insert(Request $request){
        $request->validate([
            'title' => 'required',
        ]);

        Tag::insert([
            'title' => $request->title,
            'created_at' => now(),
        ]);
        return back()->with('success','Successfully Insert Tag🔥👍🏾');
    }

    // delet tags

    function tags_delete($id){
        Tag::find($id)->delete();
        return back()->with('success','Successfully Delete Item🔥');
    }
    function restore($id){
        Tag::where('id',$id)->restore();
        return back()->with('success','Successfully Restore Item🔥');
    }

    function forcedelet($id){
        Tag::where('id',$id)->forceDelete();
        return back()->with('success','Permanently Deleted Item🔥');
    }

    function status_update($id){
        $tags = Tag::where('id',$id)->first();

        if($tags->status == 'active'){
            Tag::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('success','Deactive Success👍🏾');
        }else{
            Tag::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('success','Active Success👍🏾');
        }
    }


}
