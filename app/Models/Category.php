<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function vacancies() {
        return $this->hasMany('App\Models\Vacancy');
    }

    public function summaries() {
        return $this->hasMany('App\Models\Summary');
    }
}
