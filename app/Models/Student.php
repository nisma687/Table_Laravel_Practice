<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        "name","result","class"
    ];
    public function studentDetails():HasOne
    {
        return $this->hasOne(StudentDetail::class,"foreign_key");
    }
    protected $table = 'student';
}
