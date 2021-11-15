<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Index tag"/>

    <x-front.link uri="/tag-note/create" text="Create tag" />

  </div>

  @if ($tags->count())
  <x-table.table
    :columns="collect($tags->first())->keys()"
    crud-uri="/tag-note"
    :data-tables="$tags"
    number-head-actions=""
    image-path=""
  />
  @else
  <p class="w-full text-center text-2xl text-gray-700">She as no tags</p>
  @endif



</x-guest-layout>
