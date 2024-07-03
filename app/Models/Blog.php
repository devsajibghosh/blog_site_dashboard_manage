<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [''];
    public function RelationWithUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function RelationWithCategoory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
