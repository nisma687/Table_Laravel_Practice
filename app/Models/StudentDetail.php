<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "student_id", "father_name", "father_number"
    ];
    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class, 'foreign_key');
        
    }
    protected $table = 'student_details';
}
