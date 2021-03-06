<div class="m-3 p-3 h-full flex flex-wrap w-80 justify-center content-start rounded-xl shadow-lg border border-1 {{'bg-' . Arr::random(['red', 'blue', 'green', 'yellow', 'purple', 'indigo', 'pink']) . '-50' }} border-gray-400 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3">

  {{-- Head --}}
  <div class="w-full flex items-center justify-between">
    <p class="text-sm font-semibold">{{ $userName }}</p>

    <div class="flex space-x-1">
      {{ $status ?? null }}
    </div>

  </div>

  <h3 class="font mb-2 font-semibold text-lg">{!! $title !!}</h3>
  {{-- Body --}}
  <div class="w-full flex flex-col items-center justify-center">
    <p class="text-gray-800 w-full break-words">
      @php
      echo html_entity_decode($description);
      @endphp
    </p>
  </div>

  {{-- Footer --}}
  <div class="absolute bottom-3 transform  flex flex-wrap space-x-3 items-center first:mt-4">
    @foreach($tags as $tag)
    <x-card.pills text="{{ $tag }}" />
    @endforeach
  </div>
</div>
