@extends('layouts.main')
@section('isi')
    <!-- component -->
    <div class="w-full">
        <div class="flex bg-white" style="height:600px;">
            <div class="flex items-center text-center lg:text-left px-4 md:px-12 lg:w-1/2">
                <div>
                    <h2 class="font-semibold text-gray-900 md:text-4xl text-center"> <span
                            class="text-green-600 text-4xl font-bold"`>Objek Wisata Danau Laut Tawar</span></h2>
                    <p class="mt-2 text-sm text-gray-900 text-justify md:text-base">Danau Lut Tawar merupakan salsah satu
                        danau yang terletak di Aceh Tengah dan berada diseputar kecamatan Lut Tawar, Kebayakan, Bebesan, dan
                        Bintang. Danau tersebut merupakan danau kebanggan masyarakat disekitarnya dan dijadikan sebagai
                        sumber ekonomi, seperti pariwisata. Selain dengan keindahannya, danau ini memiliki cerita legenda
                        yang terkenal, diantaranya adalah Putri Hijau, Putri Pukes, Unok, Putri Bensu, Ikan Depik, dan
                        Lembide. Penamaan mengenai asal-usul Danau Lut Tawar dapat dilihat dari berbagai sisi, yaitu secara
                        historis Danau Lut Tawar terjadi karena gunung meletus; dari segi bahasa Lut berarti laut dan Tawar
                        berarti tidak asin, sehingga Danau Lut Tawar berarti laut tidak asin; dan juga legenda-legenda yang
                        berkembang di masyarakat, seperti legenda Unok, yaitu seseorang yang dianggap suci dan mendapat
                        ilham untuk membuat perahu karena akan terjadi air bah; legenda Putri Pukes yang berubah menjadi
                        batu serta diiringi hujan lebat akibat menjadi pembangkang; legenda Putri Hijau; legenda Putri
                        Bensu; legenda Ikan Depik; dan legenda Lembide.</p>
                    <div class="mt-10 ml-32">
                        <button class="btn btn-outline "> <a href="http://127.0.0.1:8000/info">Show Info</a> </button>
                        <button class="ml-3 btn btn-outline btn-secondary "> <a
                                href="https://id.wikipedia.org/wiki/Danau_Laut_Tawar">Danau Laut Tawar</a> </button>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                <div class="mt-16">
                    <img class="h-full w-full rounded-lg " src="{{ asset('/img/1.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <section class="bg-gray-200">
        <div class="mx-auto p-5 sm:p-10">
            <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-10 ">
                @foreach ($data as $item)
                    <div
                        class="flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg ">
                        <div
                            class="relative w-full h-60 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 group">
                            <img class="w-full h-full object-cover transition-transform duration-500 ease-in-out transform group-hover:scale-110"
                                src="{{ asset('/storage/' . $item->img) }}" alt="{{ $item->name }}" />
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-transparent to-black/60">
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

    <section class="bg-white">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a href="/" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Home
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="/maps" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Maps
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="/info" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Team
                    </a>
                </div>
            </nav>
            {{-- <div class="flex justify-center mt-8 space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                        </path>
                    </svg>
                </a>
            </div> --}}
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                © 2024 Universitas Gajah Putih, Kab Aceh Tengah, Aceh, INDONESIA.
            </p>
        </div>
    </section>
    </footer>
    </div>
@endsection
