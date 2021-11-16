<div class="m-3 p-3 flex flex-col justify-center items-center rounded-xl shadow-lg border border-1 border-gray-400">

  {{-- Head --}}
  <div class="w-full flex items-center justify-between">
    <p class="text-sm font-semibold">{{ $userName }}</p>

    <div class="w-5 h-5">
      @if ($userId != auth()->user()->id)
      <svg version="1.1" class="fill-current active:text-red-500 focus:text-red-500 hover:text-red-500" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.4 490.4" style="enable-background:new 0 0 490.4 490.4;" xml:space="preserve">
        <g>
          <g>
            <path fill="currentColor" d="M222.5,453.7c6.1,6.1,14.3,9.5,22.9,9.5c8.5,0,16.9-3.5,22.9-9.5L448,274c27.3-27.3,42.3-63.6,42.4-102.1
  			c0-38.6-15-74.9-42.3-102.2S384.6,27.4,346,27.4c-37.9,0-73.6,14.5-100.7,40.9c-27.2-26.5-63-41.1-101-41.1
  			c-38.5,0-74.7,15-102,42.2C15,96.7,0,133,0,171.6c0,38.5,15.1,74.8,42.4,102.1L222.5,453.7z M59.7,86.8
  			c22.6-22.6,52.7-35.1,84.7-35.1s62.2,12.5,84.9,35.2l7.4,7.4c2.3,2.3,5.4,3.6,8.7,3.6l0,0c3.2,0,6.4-1.3,8.7-3.6l7.2-7.2
  			c22.7-22.7,52.8-35.2,84.9-35.2c32,0,62.1,12.5,84.7,35.1c22.7,22.7,35.1,52.8,35.1,84.8s-12.5,62.1-35.2,84.8L251,436.4
  			c-2.9,2.9-8.2,2.9-11.2,0l-180-180c-22.7-22.7-35.2-52.8-35.2-84.8C24.6,139.6,37.1,109.5,59.7,86.8z" />
          </g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
      </svg>
      @endif
    </div>

  </div>

  {{-- Body --}}
  <div class="w-full flex flex-col items-center justify-center">
    <h3 class="font mb-2 font-semibold text-lg">{{ $title }}</h3>
    <p class="text-gray-800">{{ $description }}</p>
  </div>

  {{-- Footer --}}
  <div class="w-full flex items-center justify-between">

  </div>
</div>
