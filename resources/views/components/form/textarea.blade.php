@php
/*
* @param string $title
* @param string $name
* @param string $placeholder
* @param string $text
* @param string $description
*/
@endphp
<div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
  <label for="about" class="block text-sm font-medium text-gray-500">
    @php
    echo str_replace('_', ' ', $title ?? $name)
    @endphp
  </label>
  <div class="mt-1">
    <textarea id="about" name="{{ $name }}" rows="6"
      class="shadow-sm text-gray-400 focus:ring-himaraGold-500 focus:border-himaraGold-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
      placeholder="{{ $placeholder ?? null }}">
      {{ $text }}
    </textarea>
  </div>
  @if ($description ?? false)
  <p class="mt-2 text-sm text-gray-300">
    {{ $description }}
  </p>
  @endif
</div>