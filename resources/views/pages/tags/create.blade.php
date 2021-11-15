<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Index tag" />

    <x-front.link uri="/tag-note/create" text="Create tag" />

  </div>

  <x-form.form action='/tag-note' method='POST' title='Add tag'>
    <x-form.text name="name" placeholder="Name of the tag" />
  </x-form.form>

</x-guest-layout>
