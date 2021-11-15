<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class, 'user_notes', 'user_id', 'note_id');
    }
    // role_notes->roles
    public function roleNotesRoles()
    {
        return $this->belongsToMany(RoleNote::class, 'role_note_notes', 'user_id', 'role_note_id');
    }

    // role_notes->notes
    public function roleNotesNotes()
    {
        return $this->belongsToMany(Note::class, 'role_note_notes', 'user_id', 'note_id');
    }
}
