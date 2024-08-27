@extends('layouts.main')

@section('isi')
    <h1 class="mt-4 ml-10 text-3xl font-bold"> Information </h1>
    <!-- component -->
    <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <!-- Card Image and Details -->
                <div class="lg:w-1/2 w-full">
                    <img alt="ecommerce" class="object-cover object-center rounded border border-gray-200 w-full h-full"
                        src="https://www.whitmorerarebooks.com/pictures/medium/2465.jpg">
                </div>
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">BRAND NAME</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">The Catcher in the Rye</h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <!-- Add more stars if needed -->
                            <span class="text-gray-600 ml-3">4 Reviews</span>
                        </span>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <!-- Add more social icons if needed -->
                        </span>
                    </div>
                    <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha
                        taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn.
                        Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra
                        jean shorts keytar banjo tattooed umami cardigan.</p>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                        <div class="flex">
                            <span class="mr-3">Color</span>
                            <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                            <button
                                class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
                            <button
                                class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
                        </div>
                        <div class="flex ml-6 items-center">
                            <span class="mr-3">Size</span>
                            <div class="relative">
                                <select
                                    class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                                    <option>SM</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                                <span
                                    class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="title-font font-medium text-2xl text-gray-900">$58.00</span>
                        <button
                            class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Button</button>
                        <button
                            class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Information Section -->
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
                <div class="flex flex-col">
                    <h2 class="mb-2 font-bold leading-5 text-xl">Location : <span>{{ $daftar->location }}</span></h2>
                    <hr class="w-full my-2 border-gray-300 text-xl" />
                    <h2 class="mb-2 font-bold leading-5">Sub Feature : <span>{{ $daftar->sub_feature }}</span></h2>
                    <hr class="w-full my-2 border-gray-300 text-xl" />
                    <h2 class="mb-2 font-bold leading-5">Elevation : <span>{{ $daftar->elevation }}</span></h2>
                    <hr class="w-full my-2 border-gray-300 text-xl" />
                    <h2 class="mb-2 font-bold leading-5">Description : <span>{{ $daftar->deskrip }}</span></h2>
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
