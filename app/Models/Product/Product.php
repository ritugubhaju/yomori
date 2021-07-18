<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model
{
    use Sluggable;

    protected $path ='uploads/product';

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['id', 'title', 'slug', 'category_id', 'description','price','is_featured','is_popular','status','image'];

    protected $casts = [
        'is_popular' => 'boolean',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    protected $appends = [
        'thumbnail_path', 'image_path', 
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFeatured($query, $type = true)
    {
        return $query->where('is_featured', $type);
    }

    public function scopePopular($query, $type = true)
    {
        return $query->where('is_popular', $type);
    }

    public function scopeStatus($query, $type = true)
    {
        return $query->where('status', $type);
    }


    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }


    function getThumbnailPathAttribute(){
        return $this->path.'/thumb/'. $this->image;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    

}
