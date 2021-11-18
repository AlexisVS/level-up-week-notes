<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Note edition" />

  </div>

  <x-form.form action='/personnal-note/{{ $edit->id }}' method='PUT' title='Edit tag {{ $edit->name }}'>
    <x-form.text name="title" placeholder="Title of the note" :text="$edit->title" />
    <div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
      <textarea id="ckeditor" name="description">
      @php
        echo $edit->description;
      @endphp
      </textarea>
    </div>
    <div class="col-start-1 col-span-full md:col-start-2 md:col-span-4">
      <label for="country" class="block text-sm font-medium text-gray-500">
        Tags
      </label>
      <select name="tag[]" multiple class="text-gray-400 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-himaraGold-500 focus:border-himaraGold-500 sm:text-sm">
        @foreach($tags as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach

      </select>
    </div>
    <script>
      ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
          console.error(error);
        });

    </script>
    <style>
      .ck-editor__editable {
        min-height: 200px;
      }

    </style>
  </x-form.form>

</x-guest-layout>
