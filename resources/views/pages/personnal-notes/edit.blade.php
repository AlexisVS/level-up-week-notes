<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Note edition" />

  </div>

  <x-form.form action='/personnal-note/{{ $edit->id }}' method='PUT' title='Edit tag {{ $edit->name }}'>
    <x-form.text name="title"  placeholder="Title of the note" :text="$edit->title" />
    <x-form.text name="description"  placeholder="Description of the note" :text="$edit->description" />
    <x-form.select name="tag[]" title="Tags" multiple="" :options="collect($tags)->pluck('name')"/>
  </x-form.form>

</x-guest-layout>
