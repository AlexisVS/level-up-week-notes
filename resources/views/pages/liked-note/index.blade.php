<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Liked notes" />

    {{-- @if ($tags->count())
    <x-front.link uri="/shared-note/create" text="Create a note" />
    @endif --}}

  </div>

  @if ($notes->count())

  <div class="grid grid-cols-1 gap-3 md:grid-cols-2 2xl:grid-cols-3 justify-items-center">
    @foreach ($notes as $note)
    {{-- {{ dd($note->users->where('pivot.liked', '!=', 1)->where('pivot.user_id', auth()->user()->id)) }} --}}
    <a href="/personnal-note/{{ $note->id }}">
      <x-card.card user-id="{{ $note->user_id }}" user-name="{{ $note->author->name }}" title="{{ $note->title}}" description="{{ $note->description }}" :tags="$note->tags->pluck('name')" />
    </a>
    @endforeach
  </div>
  @else
  <p class="w-full text-center text-2xl text-gray-700">She as no liked notes</p>
  @endif



</x-guest-layout>
