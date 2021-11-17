<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function roleNotes () {
        return $this->belongsTo(RoleNote::class,null, 'role_note_id');
    } 

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
