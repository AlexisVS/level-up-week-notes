<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Note {{ $show->title }}"/>

    {{-- <x-front.link uri="/personnal-note/create" text="Note {{ $show->title }}" /> --}}

  </div>
  
  <x-description.description
    title="Note {{ $show->title }}"
    :data-tables="collect([$show])"
    :columns="collect($show)->keys()"
    image-path=""
    {{-- @if($show->users->)
      
    @endif --}}
    edit-uri="/personnal-note/"
    delete="true" >
    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-400">
        Tags
      </dt>
      <dd class="mt-1 text-sm text-gray-400 sm:mt-0 sm:col-span-2">
        <div class="flex flex-wrap space-x-3 space-y-1 items-center first:mt-2">
          @foreach($show->tags as $tag)
            <span class="text-xs px-2 font-semibold bg-yellow-500 bg-opacity-10 text-yellow-800 rounded py-0.5">
              #{{ $tag->name }}
            </span>
          @endforeach
        </div>
      </dd>
    </div>
  </x-description.description>

  <x-form.form title="Share your note with another people" action="/personnal-note/share/{{ $show->id }}" method="post" class="flex items-center space-x-4">
    <x-form.text name="share" placeholder="Enter email" />
  </x-form.form>

</x-guest-layout>
