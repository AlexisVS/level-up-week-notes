<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Note {{ $show->title }}"/>

    <x-front.link uri="/personnal-note/create" text="Note {{ $show->title }}" />

  </div>

  <x-description.description
    title="Note {{ $show->title }}"
    :data-tables="collect([$show])"
    :columns="collect($show)->keys()"
    image-path=""
    edit-uri="/personnal-note/"
    delete="true"
  />

  <x-form.form title="Share your note with another people" action="/personnal-note/share/{{ $show->id }}" method="post" class="flex items-center space-x-4">
    <x-form.text name="share" placeholder="Enter email" />
  </x-form.form>

</x-guest-layout>
