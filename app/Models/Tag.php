<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function notes () {
        return $this->belongsToMany(Note::class, 'tag_notes', 'tag_id', 'note_id');
    }
}
