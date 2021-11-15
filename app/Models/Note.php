<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function roleNotes() {
        return $this->belongsToMany(RoleNote::class, 'role_note_notes');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'role_note_notes');
    }

    public function userLikedNotes () {
        return $this->belongsToMany(User::class, 'liked_notes');
    }

    public function sharedNotesUser() {
        return $this->belongsToMany(User::class, 'shared_notes');
    }
}
