@php
/*
* @param string $name
* @param string $title
* @param string $multiple
* @param string $selected
* @param model or collection $options PS: utiliser pluck()
*/
@endphp
<div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
  <label for="country" class="block text-sm font-medium text-gray-500">
    @php
    echo str_replace('_', ' ', $title ?? $name)
    @endphp
  </label>
  <select @if (isset($multiple)==true) multiple  name="{{ $name . '[]' }}" @else  name="{{ $name }}" @endif
    class="text-gray-400 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-himaraGold-500 focus:border-himaraGold-500 sm:text-sm">
    @foreach($options as $option)
    <option value="{{ $option }}" @if ($selected ?? false) selected @endif>{{ $option }}</option>
    @endforeach

  </select>
</div>