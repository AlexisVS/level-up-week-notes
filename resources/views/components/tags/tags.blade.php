@php
  $choosedColor = Arr::random(['red', 'blue', 'green', 'yellow', 'purple', 'indigo', 'pink']);
@endphp
<div class="flex w-72 flex-wrap space-x-4 space-y-4 first:ml-3 first:mt-3">
  @foreach ($tags as $tag)
  <a href="{{ url()->current() . "?include=tags&filter[tags.id]=" . $tag->id}}">
    <x-tags.pills :text="$tag->name" />
  </a>
  @endforeach
</div>