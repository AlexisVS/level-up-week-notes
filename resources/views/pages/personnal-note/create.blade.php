<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Create a note" />

    <x-front.link uri="/personnal-note/create" text="Create a note" />

  </div>

  {{-- {{ dd($tags->first()->pluck('name')) }} --}}

  <x-form.form action='/personnal-note' method='POST' title='Add note'>
    <x-form.text name="title" placeholder="Title of the note" />
    <x-form.text name="description" placeholder="Description of the note" />
      <div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
        <label for="country" class="block text-sm font-medium text-gray-500">
          Tags
        </label>
        <select name="tag[]" multiple
          class="text-gray-400 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-himaraGold-500 focus:border-himaraGold-500 sm:text-sm">
          @foreach($tags as $option)
          <option value="{{ $option->id }}">{{ $option->name }}</option>
          @endforeach
      
        </select>
      </div>
  </x-form.form>

</x-guest-layout>
