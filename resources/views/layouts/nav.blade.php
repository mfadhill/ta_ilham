<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="w-full text-black bg-green-500">
  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
    @auth
          @if (auth()->user()->role == 2)
    <div class="p-5 flex flex-row items-center justify-between">
      <a href="/a_home" class="text-2xl font-bold tracking-widest text-black uppercase rounded-lg dark-mode:text- focus:outline-none focus:shadow-outline">WEBGIS Aceh Tengah</a>
      <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
      <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'a_home' ? 'active: bg-white text-black' : ' ' }}" href="/a_home">Home</a>
      <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'a_maps' ? 'active: bg-white text-black' : ' ' }}" href="/a_maps">Maps</a>
      <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'a_info' ? 'active: bg-white text-black' : ' ' }}" href="/a_info">Info</a>
      <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline{{ $active === 'a_daftar' ? 'active: bg-white text-black' : ' ' }}" href="/a_daftar"> Data </a>
      {{-- <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline{{ $active === 'a_contact' ? 'active: bg-white text-black' : ' ' }}" href="/a_contact"> Contact </a> --}}
      {{-- <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline" href="#">Contact</a> --}}
      <div @click.away="open = false" class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-bold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-green-600 dark-mode:hover:bg-green-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">
          <span>Admin</span>
          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
          <div class="px-4 py-2 bg-green-500 rounded-md shadow">
            <a class="block px-2 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg z-10 dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    @endif

    @else
    <div class="p-5 flex flex-row items-center justify-between">
        <a href="/" class="text-2xl font-bold tracking-widest text-black uppercase rounded-lg dark-mode:text- focus:outline-none focus:shadow-outline">WEBGIS Aceh Tengah</a>
        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
        {{-- <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'home' ? 'active: bg-white text-black' : ' ' }}" href="/">Home</a> --}}
      <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'home' ? 'active: bg-white text-black' : ' ' }}" href="/">Home</a>
        <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'maps' ? 'active: bg-white text-black' : ' ' }}" href="/maps">Maps</a>
        <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'info' ? 'active: bg-white text-black' : ' ' }}" href="/info"> Info </a>
        {{-- <a class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-green-600 md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline {{ $active === 'contact' ? 'active: bg-white text-black' : ' ' }}" href="/contact"> Contact </a> --}}

      </nav>
      @endauth
  </div>
</div>
