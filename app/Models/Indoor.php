<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indoor extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tags', 'location', 'email', 'website', 'description','contact_number', 'price','user_id'];


    public function scopeFilters($query, array $filter){
        if($filter['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        };

        if($filter['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orwhere('tags', 'like', '%' . request('search') . '%')
            ->orwhere('location', 'like', '%' . request('search') . '%');
        };
    }

    // relationship
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
