@extends('layouts.main')
@section('isi')

<body class="bg-gray-200">
    <h1 class="font-sans text-black text-3xl ml-8 mt-2 font-bold"> Information </h1>

    <form class="flex justify-end" action="/a_info">
        <div class="absolute border-2 rounded-btn mt-1 md:w-30 lg:w-1/4 mb-2">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
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
<section class="">
    <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-3 mt-24 ml-2 pb-4 ">
        @foreach ($daftar as $item)
            <div class="flex justify-center ">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                        <img class="rounded-t-lg hover:scale-110 transition duration-300 ease-in-out"
                            src="{{ asset('/storage/'. $item->img) }}" alt="" />
                    </a>
                    <div class="p-2 mb-2">
                        <h5 class="text-black text-xl font-bold mb-2 ml-2">{{ $item->name }}</h5>
                        <p class="text-black text-sm ml-1">
                            Location {{ $item->location }}, Feature {{ $item->feature }}
                        </p>
                    </div>
                    <div class="flex justify-end mt-2 mr-3 mb-2">
                        <a href="/detail/{{ $item->id }}"> <button
                                class="btn btn-sm btn-outline btn-accent">Detail</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

    <div class="my-8 mr-3 ">
        {{ $daftar->links() }}
    </div>

</body>
@endsection
