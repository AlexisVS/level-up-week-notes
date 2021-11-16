<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Note {{ $edit->title }}"/>

    <x-front.link uri="/personnal-note/create" text="Create tag" />

  </div>

  <x-description.description
    title="Note {{ $show->title }}"
    :data-tables="collect([$show])"
    :columns="collect($show)->keys()"
    image-path=""
    edit-uri="/personnal-note/"
  />


</x-guest-layout>
