@php
/*
* @param model or collection $icons
* @param string $title
* @param string $name
* @param string $selected = class de l'icon
*/
@endphp
<div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
  <p class="mb-2 text-sm font-medium text-gray-500">
    @php
    echo str_replace('_', ' ', $title ?? $name)
    @endphp
  </p>
  <div class="grid grid-cols-3 gap-y-4 pr-4 h-52 sm:grid-cols-5 md:grid-cols-8 lg:grid-cols-12 overflow-y-scroll ">
    <style>
      .checkbox-fa:checked+label i {
        color: rgb(237, 203, 154);
      }

    </style>
    @foreach ($icons as $icon)

    <div class="flex items-center justify-center">
      <div class="h-5 flex items-center">
        <input class="checkbox-fa opacity-0" id="{{ $name .'-' . $icon->class }}" name="{{ $name }}" type="radio" value="{{ $icon->class }}" @if($icon->class == $selected)
        checked
        @endif
        class="h-4 w-4 text-gray-400 border-gray-300 rounded">
        <label for="{{ $name .'-' . $icon->class }}" class="font-medium text-gray-400 relative right-5">
          <i fill="currentColor" class="font-fontawesome text-3xl fill-current hover:text-gray-400">{!!
            $icon->content !!}</i>
        </label>
      </div>
    </div>
    @endforeach

  </div>
</div>
