<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Index personnal note" />

    @if ($tags->count())
    <x-front.link uri="/personnal-note/create" text="Create a note" />
    @endif

  </div>

  @if ($notes->count())
  {{-- <x-table.table 
    :columns="collect($notes->first())->keys()" 
    crud-uri="/personnal-note" 
    :data-tables="$notes" 
    number-head-actions="" 
    image-path="" 
  /> --}}

  <div class="grid grid-cols-1 gap-3 md:grid-cols-2 2xl:grid-cols-3 justify-items-center">
    @foreach ($notes as $note)
    <a href="/personnal-note/{{ $note->id }}">
      <x-card.card user-id="{{ $note->user_id }}" user-name="{{ $note->author->name }}" title="{{ $note->title}}" description="{{ $note->description }}" :tags="$note->tags->pluck('name')" />
    </a>
    @endforeach
  </div>
  @else
  <p class="w-full text-center text-2xl text-gray-700">She as no notes</p>
  @endif



</x-guest-layout>
