<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleNote extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // // role_notes->notes
    // public function notes()
    // {
    //     return $this->belongsToMany(Notes::class, 'role_note_notes', 'role_note_id', 'note_id');
    // }

    // // role_notes->users
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'role_note_notes', 'role_note_id', 'user_id');
    // }

    public function userNotes()
    {
        return $this->hasOne(UserNote::class, 'role_note_id');
    }
}
