<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indoor extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tags', 'location', 'email', 'website', 'description','contact_number', 'price','user_id','photo', 'gallery', 
    'monday_opening', 'monday_closing',
    'tuesday_opening', 'tuesday_closing',
    'wednesday_opening', 'wednesday_closing',
    'thursday_opening', 'thursday_closing',
    'friday_opening', 'friday_closing',
    'saturday_opening', 'saturday_closing',
    'sunday_opening', 'sunday_closing'];


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

    public  function comments(){
        return $this->hasMany(Comment::class, 'indoor_id', 'id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class, 'indoor_id', 'id');
    }
}
