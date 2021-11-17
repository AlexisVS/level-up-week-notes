@php
  $choosedColor = Arr::random(['red', 'blue', 'green', 'yellow', 'purple', 'indigo', 'pink']);
@endphp
<span class="
  text-xs
  px-2
  font-semibold
  bg-{{ $choosedColor }}-500 bg-opacity-10
  text-{{ $choosedColor }}-800
  rounded
  py-0.5
">
  #{{ $text }}
</span>
