@php
  $choosedColor = Arr::random(['red', 'blue', 'green', 'yellow', 'purple', 'indigo', 'pink']);
@endphp
<div class="grid grid-flow-col gap-2 mb-5">
  @foreach ($tags as $tag)
  <a href="{{ url()->current() . "?include=tags&filter[tags.id]=" . $tag->id}}">
    <x-tags.pills :text="$tag->name" />
  </a>
  @endforeach
</div>