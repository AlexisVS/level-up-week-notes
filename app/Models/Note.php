<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // user_notes->users
    public function users() {
        return $this->belongsToMany(User::class, 'user_notes', 'note_id', 'user_id')->withPivot(['liked', 'shared']);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'tag_notes','note_id', 'tag_id');
    }

    // role_notes->roles
    public function roleNotesRoles() {
        return $this->belongsToMany(RoleNote::class,'role_note_notes', 'note_id', 'role_note_id');
    }

    // role_notes->users
    public function roleNoteUsers() {
        return $this->belongsToMany(User::class, 'role_note_notes', 'note_id', 'user_id');
    }
}
