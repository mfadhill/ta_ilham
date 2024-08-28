@extends('layouts.main')
@section('isi')
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
                            <p class="block font-sans text-base leading-relaxed  antialiased font-bold">
                                Desa : {{ $item->location }}
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

    <!-- Foooter -->
    <section class="bg-white">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a href="/a_home" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Home
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="/a_maps" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Maps
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="/a_info" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Team
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="/a_daftar" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Data
                    </a>
                </div>
            </nav>
        </div>
    </section>
@endsection
