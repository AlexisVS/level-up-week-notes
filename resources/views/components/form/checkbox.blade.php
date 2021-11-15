@php
/*
* @param string $title
* @param string $name
* @param string $label
* @param string $labelSubtitle
*/
@endphp
<div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
  <p class="mb-2 text-sm font-medium text-gray-500">
    @php
    echo str_replace('_', ' ', $title ?? $name)
    @endphp
  </p>
  <div class="flex items-start">
    <div class="h-5 flex items-center">
      <input id="comments" name="{{ $name }}" type="checkbox" value="1" class="focus:ring-himaraGold-500 h-4 w-4 text-gray-400 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
      <label for="comments" class="font-medium text-gray-400">{{ $label }}</label>
      @if ($labelSubtitle ?? false)
      <p class="text-gray-300">{{ $labelSubtitle }}</p>
      @endif
    </div>
  </div>
</div>
