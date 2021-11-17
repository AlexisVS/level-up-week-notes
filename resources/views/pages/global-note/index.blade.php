<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="All notes" />

  </div>

  @if ($notes->count())
  <div class="fixed right-0 top-1/2 transform -translate-y-1/2">
    <x-tags.tags :tags="$tags"/>
  </div>
  <div class="flex">

    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 2xl:grid-cols-3 justify-items-center">
      @foreach ($notes as $note)
      {{-- {{ dd($note->users->where('pivot.liked', '!=', 1)->where('pivot.user_id', auth()->user()->id)) }} --}}
      <a href="/personnal-note/{{ $note->id }}">
        <x-card.card user-id="{{ $note->user_id }}" user-name="{{ $note->author->name }}" title="{{ $note->title}}" description="{{ $note->description }}" :tags="$note->tags->pluck('name')">
          <x-slot name="status">
            @if(auth()->check())
            @if( $note->users->where('pivot.author_id', '=', auth()->user()->id)->count())
            @elseif ($note->users->where('pivot.liked', '=', 1)->where('pivot.user_id', auth()->user()->id)->count())
            <form action="/global-note/unlike/{{ $note->id }}" method="POST">
              @csrf
              @method('PUT')
              <button type="submit" class="border-0 bg-transparent">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
                  <path class="fill-current text-red-400 hover:text-transparent" d="M54.039,272.547c-54.903-54.903-54.903-144.222,0-199.125c26.59-26.59,61.943-41.233,99.558-41.233c33.502,0,66.21,12.442,92.109,35.038l10.291,9.617l9.967-9.318c26.223-22.895,58.931-35.337,92.433-35.337c37.615,0,72.969,14.643,99.558,41.233c54.903,54.903,54.903,144.222,0,199.125L255.998,474.506L54.039,272.547z" />
                  <path style="fill:#573A32;" class="pointer-events-none" d="M358.398,19.389c-36.779,0-73.259,13.662-102.4,39.919c-29.15-26.257-65.621-39.919-102.4-39.919c-39.313,0-78.618,14.993-108.612,44.988c-59.981,59.981-59.981,157.235,0,217.225l211.012,211.012L467.01,281.601C527,221.612,527,124.366,467.01,64.377C437.016,34.382,397.711,19.389,358.398,19.389z M448.911,263.502L255.998,456.406L63.085,263.502c-49.903-49.911-49.903-131.115,0-181.018c24.175-24.175,56.32-37.487,90.513-37.487c31.206,0,60.399,11.563,83.695,31.889l18.705,17.485l18.714-17.493c23.296-20.318,52.489-31.889,83.686-31.889c34.193,0,66.33,13.312,90.513,37.487C498.814,132.387,498.814,213.59,448.911,263.502z" />
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg>
              </button>
            </form>
            @else
            <form action="/global-note/like/{{ $note->id }}" method="POST">
              @csrf
              @method('PUT')
              <button type="submit" class="border-0 bg-transparent">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
                  <path class="fill-current text-transparent hover:text-red-400" d="M54.039,272.547c-54.903-54.903-54.903-144.222,0-199.125c26.59-26.59,61.943-41.233,99.558-41.233c33.502,0,66.21,12.442,92.109,35.038l10.291,9.617l9.967-9.318c26.223-22.895,58.931-35.337,92.433-35.337c37.615,0,72.969,14.643,99.558,41.233c54.903,54.903,54.903,144.222,0,199.125L255.998,474.506L54.039,272.547z" />
                  <path style="fill:#573A32;" d="M358.398,19.389c-36.779,0-73.259,13.662-102.4,39.919c-29.15-26.257-65.621-39.919-102.4-39.919c-39.313,0-78.618,14.993-108.612,44.988c-59.981,59.981-59.981,157.235,0,217.225l211.012,211.012L467.01,281.601C527,221.612,527,124.366,467.01,64.377C437.016,34.382,397.711,19.389,358.398,19.389z M448.911,263.502L255.998,456.406L63.085,263.502c-49.903-49.911-49.903-131.115,0-181.018c24.175-24.175,56.32-37.487,90.513-37.487c31.206,0,60.399,11.563,83.695,31.889l18.705,17.485l18.714-17.493c23.296-20.318,52.489-31.889,83.686-31.889c34.193,0,66.33,13.312,90.513,37.487C498.814,132.387,498.814,213.59,448.911,263.502z" />
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg>
              </button>
            </form>
            @endif
            @endif

          </x-slot>
        </x-card.card>
      </a>
      @endforeach
    </div>
  </div>

  @else
  <p class="w-full text-center text-2xl text-gray-700">She as no shared notes</p>
  @endif

</x-guest-layout>
