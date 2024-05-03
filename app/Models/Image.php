<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'path',
        'school_id',
        'created_at',
        'updated_at'
        
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }
}
