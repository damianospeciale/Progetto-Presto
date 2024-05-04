<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model
{
    use HasFactory, Searchable;
    public $asYouType = true;
    protected $fillable=[
        'title',
        'body',
        'price',
        'category_id'
    ];
    
    public function toSearchableArray()
    {
        // $array = $this->toArray();
        $category =$this->category;
        $array = [
            'id'=> $this->id,
            'title'=> $this->title,
            'body'=> $this->body,
            'category'=>$category,
            'image'=> $this->image
        ];
        
        return $array;
    }
    
    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user() :BelongsTo
    {
        
        return $this->belongsTo(User::class);
    }
    public function setAccepted($value)
    {
        $this->is_accepted =$value;
        $this->save();
        return true;
    } 
    public static function toBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->count();
    }
    
    public function images() : HasMany {
        return $this->hasMany(Image::class);
    }
    
    /**
    * Get the indexable data array for the model.
    *
    * @return array
    */
    
    
    
    
    
    // Customize array...
    
    
    
}
