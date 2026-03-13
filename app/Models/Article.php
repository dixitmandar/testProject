<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title','content','url','source','topic_id','published_at'
    ];

    public function summary()
    {
        return $this->hasOne(Summary::class);
    }
}
