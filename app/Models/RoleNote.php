<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleNote extends Model
{
    use HasFactory;

    public function notes() {
        return $this->belongsToMany(Notes::class, 'role_note_notes');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'role_note_notes');
    }
}
