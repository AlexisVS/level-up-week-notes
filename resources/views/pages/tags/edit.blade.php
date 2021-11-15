<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Tag edition"/>

  </div>

  <x-form.form action='/tag-note/{{ $edit->id }}' method='PUT' title='Edit tag {{ $edit->name }}'>
    <x-form.text name="name" :value="$edit->name" placeholder="Name of the tag" />
  </x-form.form>

</x-guest-layout>
