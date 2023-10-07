<?php

namespace App\Models;


use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model implements Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'applicants';

    use \Illuminate\Auth\Authenticatable;

    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }

}
