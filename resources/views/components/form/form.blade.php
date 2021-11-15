@php
/*
* @param string :$title
* @param string :$subtitle
* @param string $btnSubmitText
* @param string $action
* @param string $enctype
* @param string $method
*/
@endphp
<div class="px-2 mb-36">
  <div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="pb-10 px-6 pt-6  bg-gray-800 border-b border-gray-200 ">
      @if ($title ?? false)
      <h3 class="  text-xl leading-6 font-medium text-white tracking-wider">
        {{ $title }}
      </h3>
      @endif
      @if ($subtitle ?? false)
      <p class="mt-1 text-sm text-gray-50">
        {{ $subtitle }}
      </p>
      @endif
    </div>
    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9 bg-white">
      <form action="{{ $action }}" method="POST" @if ($enctype ?? false && $enctype==true) enctype="multipart/form-data" @endif>
        @csrf
        @method($method)
        <div class=" py-6 px-4 space-y-6 sm:p-6">
          <div class="grid grid-cols-6 gap-6">
            {{-- /* ---------------------------------- Slot ---------------------------------- */ --}}
            {{ $slot }}
            {{-- /* --------------------------------- Submit --------------------------------- */ --}}
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="submit" class=" bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover: bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-himaraGold-500">
            {{ $btnSubmitText ?? false ? $btnSubmitText : 'Save'}}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
