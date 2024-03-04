<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        "package_name",
        "package_price",
        "currency",
        "package_duration_hour",
        "package_duration_day"

    ];
    protected $table="table_packages";
}
