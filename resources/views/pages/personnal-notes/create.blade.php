<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Create a note" />

    <x-front.link uri="/personnal-note/create" text="Create a note" />

  </div>

  {{-- {{ dd($tags->first()->pluck('name')) }} --}}

  <x-form.form action='/personnal-note' method='POST' title='Add note'>
    <x-form.text name="title" placeholder="Title of the note" />
    <x-form.text name="description" placeholder="Description of the note" />
    <x-form.select name="tag[]" title="Tags" multiple="" :options="$tags->first()->pluck('name')"/>
  </x-form.form>

</x-guest-layout>
