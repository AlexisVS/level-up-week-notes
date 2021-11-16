@php
/*
* @pram string $title
* @pram string $subtitle
* @pram model or collection $dataTables
* @pram array $columns
* @pram string $imagePath
* @pram string $editUri
*/
@endphp
@foreach($dataTables as $row)
<div class="mb-28 mt-8  bg-gray-800 shadow overflow-hidden sm:rounded-lg">
  <div class="flex items-center justify-between w-full pr-5">
    <div class="px-4 py-5 sm:px-6 ">
      <h3 class="text-2xl leading-6   font-semibold text-gray-100">
        @if ($title ?? false)
        {{ $title }}
        @endif
      </h3>
      <p class="mt-1 max-w-2xl text-md text-gray-50">
        @if ($subtitle ?? false)
        {{ $subtitle }}
        @endif
      </p>
    </div>
    <div class="flex space-x-3 items-center">

      <a href="
      @if ($uriStatic ?? false)
    {{ $editUri }}
    @else
    {{ $editUri . $row->id . '/edit' }}
    @endif
    ">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-100 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
      </svg>
    </a>
    @if ($delete ?? false == true)
    <form action="/personnal-note/{{ $row->id }}" method="POST">
      @csrf
      @method('DELETE')
      <button class="text-white" type="submit" value="1">
        DELETE
      </button>
    </form>
    @endif
  </div>
  </div>
  <div class="border-t border-gray-200">
    <dl class="">
      @foreach($columns as $column)
      @if (Str::contains($column, ['i_class']) == true )
      <div class="{{ $loop->iteration % 2 == 1 ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-400">
          @php
          echo str_replace('_', ' ', $column ?? '')
          @endphp
        </dt>
        <dd class="mt-1 text-sm text-gray-400 sm:mt-0 sm:col-span-2">
          <i class="fa fa-2x {{ $row->$column }}"></i>
        </dd>
      </div>
      @elseif (Str::contains($column, ['img']) == true && isset($imagePath) )
      <div class="{{ $loop->iteration % 2 == 1 ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-400">
          @php
          echo str_replace('_', ' ', $column ?? '')
          @endphp
        </dt>
        <dd class="mt-1 text-sm text-gray-400 sm:mt-0 sm:col-span-2">
          <img class="max-w-xs max-h-32" src="{{ asset($imagePath . (substr($imagePath, -1) != '/' ? '/' : '') . $row->$column)}}" alt="">
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
          {{ $row->$column }}
        </dd>
      </div>
      @endif
      @endforeach
    </dl>
  </div>
</div>
@endforeach
