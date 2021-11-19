<x-guest-layout>

  <div class="w-full flex items-center justify-between px-3">

    <x-front.title title="Note {{ $show->title }}"/>

    {{-- <x-front.link uri="/personnal-note/create" text="Note {{ $show->title }}" /> --}}

  </div>
  
  {{-- <x-description.description
    title="Note {{ $show->title }}"
    :data-tables="collect([$show])"
    :columns="collect($show)->keys()"
    image-path="" --}}
    {{-- @if($show->users->)
      
    @endif --}}
    {{-- edit-uri="/personnal-note/"
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
  </x-description.description> --}}










  <div class="mb-28 mt-8  bg-gray-800 shadow overflow-hidden sm:rounded-lg">
    <div class="flex items-center justify-between w-full pr-5">
      <div class="px-4 py-5 sm:px-6 ">
        <h3 class="text-2xl leading-6   font-semibold text-gray-100">
          Edit note
        </h3>
      </div>
      <div class="flex space-x-3 items-center">
        {{-- {{ dd($show->user_id) }} --}}
      
  <a href="/personnal-note/{{ $show->id }}/edit">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-100 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </a>
        <form action="/personnal-note/{{ $show->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="text-white" type="submit" value="1">
            DELETE
          </button>
        </form>
      </div>
    </div>
    <div class="border-t border-gray-200">
      <dl class="">
        @foreach(collect($show)->keys() as $column)
      
        @if (Str::contains($column, ['description']) == true)
        <div class="{{ $loop->iteration % 2 == 1 ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-400">
            @php
            echo str_replace('_', ' ', $column ?? '')
            @endphp
          </dt>
          <dd class="mt-1 text-sm text-gray-400 sm:mt-0 sm:col-span-2">
            @php
              echo $show->$column;
            @endphp
          </dd>
        </div>
        @else
  
        <div class="{{ $loop->iteration % 2 == 1 ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-400">
            @php
            echo str_replace('_', ' ', $column ?? '')
            @endphp
          </dt>
          <dd class="mt-1 text-sm text-gray-400 sm:mt-0 sm:col-span-2">
            {{ $show->$column }}
          </dd>
        </div>
        @endif
        @endforeach
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
      </dl>
    </div>
  </div>











  <x-form.form title="Share your note with another people" action="/personnal-note/share/{{ $show->id }}" method="post" class="flex items-center space-x-4">
    <x-form.text name="share" placeholder="Enter email" />
  </x-form.form>

</x-guest-layout>
