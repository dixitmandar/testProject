<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable = ['article_id','summary'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
