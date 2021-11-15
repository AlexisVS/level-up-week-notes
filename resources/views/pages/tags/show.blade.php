<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Index tag"/>

    <x-front.link uri="/tag-note/create" text="Create tag" />

  </div>

  <x-description.description
    title="Tag {{ $show->name }}"
    :data-tables="collect([$show])"
    :columns="collect($show)->keys()"
    image-path=""
    edit-uri="/tag-note/"
  />

</x-guest-layout>
