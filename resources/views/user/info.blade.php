@extends('layouts.main')
@section('isi')

    <body class="bg-gray-200">
        <h1 class="font-sans text-black text-3xl ml-8 mt-2 font-bold"> Information </h1>

        <form class="flex justify-end" action="/info">
            <div class="absolute border-2 rounded-btn mt-1 md:w-30 lg:w-1/4 mb-2">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="search" name="search"
                    class="block p-4 pl-10 w-full items-end text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                    placeholder="Search" required value="{{ request('search') }}">
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
            </div>
        </form>
        <section class="bg-gray-200 mt-20">
            <div class="mx-auto p-5 sm:p-10">
                <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-10 ">
                    @foreach ($daftar as $item)
                        <div
                            class="flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg ">
                            <div
                                class="relative w-full h-60 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 group">
                                <img class="w-full h-full object-cover transition-transform duration-500 ease-in-out transform group-hover:scale-110"
                                    src="{{ asset('/storage/' . $item->img) }}" alt="{{ $item->name }}" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-transparent via-transparent to-black/60">
                                </div>
                            </div>
                            <div class="p-4 flex-grow">
                                <div class="mb-3 flex items-center justify-between">
                                    <h5
                                        class="block font-sans text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased">
                                        {{ $item->name }}
                                    </h5>
                                </div>
                                <p class="block font-sans text-base leading-relaxed text-gray-700 antialiased font-bold">
                                    Kec : {{ $item->location }}
                                </p>
                            </div>
                            <div class="p-6 pt-6 relative mr-2">
                                <a href="/detail/{{ $item->id }}">
                                    <button
                                        class="absolute bottom-0 right-0 left-100 mx-auto mb-4 w-32 h-10 select-none rounded-lg bg-green-500 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:bg-green-600 hover:shadow-lg hover:shadow-green-600/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button" data-ripple-light="true">
                                        Detail
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="my-8 mr-3 ">
            {{ $daftar->links() }}
        </div>

    </body>
@endsection
