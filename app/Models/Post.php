<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasSlug;

    protected $fillable =  ['title', 'description', 'content', 'category_id', 'thumbnail'];

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * return slug
     */

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function uploadImage(Request $request, $image = null){

        if ($request->hasFile('thumbnail')){
            $folder = date('Y-m-d');

            if($image){
                Storage::delete("$image");
            }

            return $request->file('thumbnail')->store("images/$folder");
        }
        return null;
    }

    public function getImage(){
        if(!$this->thumbnail){
            return asset("/assets/no-img.jpg");
        }
        return asset("/uploads/$this->thumbnail");
    }

    public function getDate(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }

    public function scopeLike($query, $search){
        return $query->where('title', 'LIKE', "%{$search}%");
    }
}
