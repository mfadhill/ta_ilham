@extends('layouts.main')

@section('isi')
    <h1 class="mt-4 ml-10 text-3xl font-bold"> Information </h1>
    <div class="px-4 py-6 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-10">
        <div class="max-w-xl mb-4 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
            <h3
                class="max-w-lg mb-6 font-sans text-2xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                <span class="relative inline-block">
                </span>
                {{ $daftar->name }}
            </h3>
        </div>
        <div class="grid max-w-screen-lg gap-8 lg:grid-cols-2 sm:mx-auto">
            <div class="flex flex-col p-6 bg-white rounded-lg shadow-lg shadow-inherit">
                <div class="flex flex-col space-y-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Desa <span class="font-normal">{{ $daftar->location }}</span>
                        </h2>
                        <hr class="border-gray-300" />
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Kecamatan: <span class="font-normal">{{ $daftar->sub_feature }}</span>
                        </h2>
                        <hr class="border-gray-300" />
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Description: <span class="font-normal">{{ $daftar->deskrip }}</span>
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

        <div class="mt-8">
            <h1 class="text-xl font-bold">Map Objek terdekat dari {{ $daftar->name }}</h1>
            <div id="mapid" class="mt-3" data-longitude="{{ $daftar->longitude }}"
                data-latitude="{{ $daftar->latitude }}"></div>
        </div>
    </div>
@endsection
