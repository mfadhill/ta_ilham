@extends('layouts.main')

@section('isi')
    <h1 class="mt-4 ml-10 text-3xl font-bold"> Information </h1>
    <div class="px-4 py-6 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="max-w-xl mb-4 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
            <h3
                class="max-w-lg mb-6 font-sans text-2xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                <span class="relative inline-block">
                </span>
                {{ $daftar->name }}
            </h3>
        </div>
        <div class="grid max-w-screen-lg gap-8 lg:grid-cols-2 sm:mx-auto">
            <div class="flex flex-col justify-center">
                <div class="flex">
                    <div class="ml-6 text-lg">
                        <h2 class="mb-2 font-bold leading-5 text-xl">
                            Location : <span>
                                {{ $daftar->location }}
                        </h2>
                        <hr class="w-full my-2 border-gray-300 text-xl" />
                        <h2 class="mb-2 font-bold leading-5">
                            Sub Feature : <span>
                                {{ $daftar->sub_feature }}
                        </h2>
                        <hr class="w-full my-2 border-gray-300 text-xl" />
                        <h2 class="mb-2 font-bold leading-5">
                            Elevation : <span>
                                {{ $daftar->elevation }}
                        </h2>
                        <hr class="w-full my-2 border-gray-300 text-xl" />
                        <h2 class="mb-2 font-bold leading-5">
                            Description : <span>
                                {{ $daftar->deskrip }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <img class="object-cover w-full h-56 col-span-2 rounded shadow-lg"
                    src="{{ asset('/storage/' . $daftar->img) }}" alt="" />
                @foreach ($daftar->image as $daf)
                    <img class="object-cover w-full h-48 rounded shadow-lg" src="{{ asset('/storage/' . $daf) }}" />
                @endforeach
            </div>
        </div>

        <div class="mt-4">
            <div id="mapid" data-longitude="{{ $daftar->longitude }}" data-latitude="{{ $daftar->latitude }}"></div>
        </div>
    </div>
@endsection
