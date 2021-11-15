@php
/*
* @param string $title
* @param string $name
* @param string $placeholder
* @param string $text
*/
@endphp
<div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
  <label for="street-address" class="block text-sm font-medium text-gray-500">
    @php
    echo str_replace('_', ' ', $title ?? $name)
    @endphp
  </label>
  <input type="text" name="{{ $name }}" id="street-address" placeholder="{{ $placeholder ?? '' }}" value="{{ $text ?? false && $text }}"
    class="text-gray-400 placeholder-gray-300 mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-himaraGold-500 focus:border-himaraGold-500 sm:text-sm">
</div>