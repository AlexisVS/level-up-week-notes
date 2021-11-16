<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\RoleNote;
use App\Models\RoleNoteNote;
use App\Models\Tag;
use App\Models\TagNote;
use App\Models\User;
use App\Models\UserNote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class personnalNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notesQueried = collect([]);
        $notes = Note::all();
        foreach ($notes as $note) {
            if ($note->users->first()->id == auth()->user()->id) {
                $notesQueried->push($note);
            }
        }

        $data = [
            "notes" => $notesQueried,
            "tags" => Tag::all(),
        ];

        return view('pages.personnal-notes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'tags' => Tag::all(),
        ];

        return view('pages.personnal-notes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Note();
        $store->title = $request->title;
        $store->description = $request->description;
        $store->save();

        foreach (collect($request->tag)->collapse() as $tag) {
            $storeTag = new Tag();
            $storeTag->name = $tag;
            $storeTag->save();

            $tagNote = new TagNote();
            $tagNote->tag_id = $storeTag->id;
            $tagNote->note_id = $store->id;
            $tagNote->save();
        }

        $store->users()->attach(auth()->user()->id,[
            "liked" => 0,
            "shared" => 0,
        ]);

        $roleNote = new RoleNoteNote();
        $roleNote->note_id = $store->id;
        $roleNote->role_note_id = 1;
        $roleNote->user_id = auth()->user()->id;
        $roleNote->save();

        return redirect('/personnal-note')->with('success', 'Note was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            "show" => Note::find($id),
        ];

        return view('pages.personnal-notes.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "edit" => Note::find($id),
            "tags" => Tag::all(),
        ];

        return view('pages.personnal-notes.edit', $data);
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
        $update = Note::find($id);

        $update->title = $request->title;
        $update->description = $request->description;
        $update->save();

        return redirect('/personnal-note')->with('success', 'Note was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TagNote::where('note_id', $id)->delete();
        UserNote::where('note_id', $id)->delete();
        Note::destroy($id);

        return redirect('/personnal-note')->with('success', 'Your note has been successfully destroyed.');
    }

    public function share (Request $request, $noteId) {
        $request->validate([
            "share" => 'required|email',
        ]);

        $userShared = User::all()->where('email', $request->share)->first();
        if ($userShared ?? false != null) {
            $userNote = UserNote::all()->where('note_id', $noteId)->where('user_id', $userShared->id)->first();
        } else {
            dd('problem');
            return redirect('/personnal-note')->with('error', 'A probleme has been encountered during the process.');
        }
        if ($userNote ?? false != null) {
            $userNote->shared = 1;
            $userNote->save();
            // dd($userNote);
        } else {
            $newUserNote = new UserNote();
            $newUserNote->user_id = $userShared->id;
            $newUserNote->note_id = $noteId;
            $newUserNote->liked = 0;
            $newUserNote->shared = 1;
            $newUserNote->save();
        }

        dd($userNote , $newUserNote ?? ' pas de user note');

        return redirect('/personnal-note')->with('success', 'Your note has been successfully shared to ' . $request->share . '.');
    }
}
