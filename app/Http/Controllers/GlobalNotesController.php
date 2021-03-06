<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\UserNote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class GlobalNotesController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Note::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noteOrderedByLikes = Note::with('users')->withSum('users', 'user_notes.liked')->get()->sortByDesc(function ($item) {
            return $item->users_sum_user_notesliked;
        });

        if (request()->query('tagId')) {
            $notes = $noteOrderedByLikes->filter(function ($item) {
                return $item->tags->where('id', request()->query('tagId'))->count() > 0;
            });
        } else {
            $notes = $noteOrderedByLikes;
        }

        $data = [
            "notes" => $notes,
            "tags" => Tag::all(),
            "userNotes" => UserNote::all(),
        ];

        return view('pages.global-note.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function like($noteId)
    {
        $note = UserNote::all()->where('note_id', $noteId)->where('user_id', auth()->user()->id);
        if ($note->count() == 0) {
            $userNote = new UserNote([
                "user_id" => auth()->user()->id,
                "note_id" => $noteId,
                "role_note_id" => null,
                "author_id" => Note::find($noteId)->user_id,
                "liked" => 1,
                "shared" => 0,
            ]);
            $userNote->save();
        } else {
            $note->first()->liked = 1;
            $note->first()->save();
        }

        return redirect("/")->with('success', 'Your like has been added.');
    }

    public function unlike($noteId)
    {
        $note = UserNote::all()->where('note_id', $noteId)->where('user_id', auth()->user()->id);
        $note->first()->liked = 0;
        $note->first()->save();

        return redirect("/")->with('success', 'Your like has been removed.');
    }
}
