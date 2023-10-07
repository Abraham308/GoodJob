<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model implements Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'employers';

    use \Illuminate\Auth\Authenticatable;

    public function vacancies () {
        return $this->hasMany(Vacancy::class);
    }
}
