<div class="m-3 p-3 flex flex-wrap w-80 justify-center content-between rounded-xl shadow-lg border border-1 {{'bg-' . Arr::random(['red', 'blue', 'green', 'yellow', 'purple', 'indigo', 'pink']) . '-50' }} border-gray-400 h-44 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3">

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
      $text = $description;
        echo $text;
      @endphp
    </p>
  </div>

  {{-- Footer --}}
  <div class="w-full flex flex-wrap space-x-3 space-y-1 items-center first:mt-3">
    @foreach($tags as $tag)
    <x-card.pills text="{{ $tag }}" />
    @endforeach
  </div>
</div>
