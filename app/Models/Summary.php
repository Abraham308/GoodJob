<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'author_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
