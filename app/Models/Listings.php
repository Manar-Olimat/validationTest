<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    use HasFactory;

###################
# in appServiceProvider
# Model::Ungard 
# replace fillable statment
#########################

//     protected $fillable = [
//         'title',
//             'tags',
//             'company',
//             'location',
//             'email',
//             'website',
//             'description'
           
//     ];

    public function scopeFilter($query, array $filters){
        //sql query filter by tag
        if($filters['tag'] ?? false){
$query->where('tags','like','%'.request('tag').'%');
        }

//sql query filter by search
        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
            ->orWhere('description','like','%'.request('search').'%')
            ->orWhere('tags','like','%'.request('search').'%');
                    }
    }


    











}
