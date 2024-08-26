@extends('layouts.main')
@section('isi')

<body>
        <section class="flex flex-row ">
            <div class="flex flex-col md:flex-row lg:w-full">
                <div class="order-last md:order-first w-100 md:w-1/4 md:mr-16">
                    {{-- modal --}}
                    <div class="flex flex-row justify-center mr-24 ">
                        <form class="flex justify-end" action="/maps">
                            <div class="ml-2 mt-4 flex mb-16  md:w-60 lg:w-1/4">
                                <div class="absolute border-2 w-60 rounded-btn mt-1">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="search" id="search" name="search"
                                        class="block p-4 pl-10 w-full items-end text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                        placeholder="Search" required value="{{ request('search') }}">
                                    <div class="pl-10">
                                        <button type="submit"
                                            class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="lokasi" class="ml-3">
                            @if (count($daftar) == "null")
                                <div class="mt-2 h-30 border-2 border-gray-500 rounded-lg pr-1">
                                    <p class="font-semibold">No Data Found </p>
                                </div>
                            </div>
                        @else
                        @foreach($daftar as $item)
                            <div style="width: 350px;" class="mt-2 h-30 border-2 border-gray-500 rounded-lg pr-1" >
                                <img style="width: 690px !important;" class="px-1 py-1"
                                    src=" {{ asset('/storage/'. $item->img) }}">
                                <h2 class="text-2sm font-bold ml-4">{{ $item->name }} </h2>
                                <div class="flex ml-3">
                                    <span class="ml-1 text-sm">Location : {{ $item->location }}
                                </span>
                                </div>
                                <div class="flex  ml-3">
                                    <span class="ml-1  text-sm text-center">Feature : {{ $item->feature }}</span>
                                </div>
                                <div class="flex ml-3">
                                    <span class="ml-1  text-sm text-center">Sub Feature : {{ $item->sub_feature }}</span>
                                </div>
                                {{-- Rating --}}
                                {{-- <div class="pt-0 mt-2 ml-4">
                                    <div class="flex items-center">
                                        <div class="flex items-center w-24">
                                            @for ($x = 1; $x <= $item->skor; $x++)
                                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                            @endfor
                                            @for ($x = 0; $x < $item->sisa; $x++)
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                            @endfor
                                        </div> --}}
                                        {{-- <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            {{ round($item->skor, 1) }}/5</p> --}}
                                    {{-- </div>
                                </div> --}}
                                <div class="stat pt-0 mt-2 ml-0">
                                    <div class="flex justify-end">
                                        <button
                                            class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button"> <a href="/detail/{{ $item->id }}">Detail</a></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>
                    <div class="my-1 mt-12 mr-3 paginate-text">
                        {{ $daftar->links() }}
                    </div>
                </div>
                <div class="order-first md:order-last w-full md:w-2/3 md:ml-6 mt-20">
                    <div>
                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                        id="modal-id">
                        <div class="relative mt-20 w-auto my-6 mx-auto max-w-3xl">
                            <!--content-->
                            <div
                                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                <!--header-->
                                <div
                                    class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                    <h3 class="text-3xl font-semibold">
                                        Panduan Rute
                                    </h3>
                                    <button
                                        class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                        onclick="toggleModal('modal-id')">
                                        <span
                                            class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                            ×
                                        </span>
                                    </button>
                                </div>
                                <!--body-->
                                <div class="relative p-6 flex-auto">
                                    <p class="my-4 text-slate-500 text-lg leading-relaxed">
                                        1. Determine your location by pressing the start button from your position or moving the blue marker on the map.<br>
                                        2. You can search for a destination by searching for the name of a tourist attraction, village, district or tourist category and pressing the route button to route from your location.<br>
                                        3. You can also click on the red marker, a pop up will appear, and press select here to route.<br>
                                        4. Finish <br>
                                    </p>
                                </div>
                                <!--footer-->
                                <div
                                    class="flex items-center justify-end p-4 border-t border-solid border-slate-200 rounded-b">
                                    <button class="btn btn-outline btn-warning" type="button"
                                        onclick="toggleModal('modal-id')">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div class="mt-2">
                    <div class="z-10" style="position:relative; height: 590px; width: 100%;" id="mapid"></div>
                </div>

                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="my-modal-3" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative">
                        <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <h3 class="font-bold text-lg">Voting</h3>
                        <form action="/vote" method="post" class="ml-10">
                            @csrf
                            <input type="text" class="hidden" id="id_lokasi" name="id_lokasi" />
                            <div class="w-full mt-10">
                                <input type="range" min="1" max="5" value="1" class="range" step="1" name="skor" />
                                <div class="w-full flex justify-between text-xs px-2">
                                    <span>1 <br> <p class="mt-1">Buruk</p></span>
                                    <span>2</span>
                                    <span>3</span>
                                    <span>4</span>
                                    <span>5 <br> <p class="mt-1">Bagus</p></span> 
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="flex mb-10 mt-16">
                                    <button
                                        class="bg-green-500 text-gray-100 font-bold rounded border-b-2 rounded-full border-green-500 hover:border-green-700 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                        <span class="ml-2">Vote</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </section>
</body>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script src="{{ asset('leaflet-compass-master/src/leaflet-compass.js')}}"></script>
<script type="text/javascript" src="js/batas.js"> </script>
<script type="text/javascript">
    //voting
    $(document).on("click", ".btn-voting", function () {
        const id_lokasi = $(this).attr("data-id")
        $("#id_lokasi").val(id_lokasi)
    })

    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }

    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
            placement: 'bottom-start'
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }

    let latLng = [3.7024633, 114.8701836 ];
    var mymap = L.map('mapid').setView(latLng, 7);
    L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(mymap);

    var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });
        
    var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const kategori = urlParams.get('search')
    let query = ''
    if (kategori != null) {
        query = `?search=${kategori}`
    }

    // console.log(query);
 //compass
 var comp = new L.Control.Compass({autoActive: true, showDigit:true});
    mymap.addControl(comp);
    
    $.ajax({
        url: 'http://127.0.0.1:8000/json' + query,
        success: function (response) {
            const myLayer = L.geoJSON(response, {
                onEachFeature: function (feature, layer) {
                    let coord = feature.geometry.coordinates;
                    layer.bindPopup(
                        `<h1 class="text-sm"><b> <center>  ${feature.properties.name}</center></b><center> Location  ${feature.properties.location} , Feature ${feature.properties.feature} </center> </h1>`
                    )
                },
                pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {
                        icon: smallIcon
                    });
                },

            }).on('click', function (e) {
                const id_lokasi = e.layer.feature.properties.id;
                getDetailLokasi(id_lokasi)
                $('.paginate-text').addClass('hidden')
            }).addTo(mymap)
            // control Search
            L.control.search({
                layer: myLayer,
                initial: false,
                propertyName: 'name',
                buildTip: function (text, val) {
                    return '<a href="#" class="">' + text + '<b>'
                    '</b></a>';
                }
            }).addTo(mymap);
        }
    })

//     let control = L.Routing.control({
//         waypoints: [
//             latLng
//         ],
//         lineOptions: {
//       styles: [{color: 'blue', opacity: 1, weight: 5}]
//    }
//     }).addTo(mymap);

    $(document).on("click", ".keSini", function () {
        // Let latlng = [$(this).data('lat'), $(this).data('lng')];
        const lat = $(this).data('lat')
        const long = $(this).data('lng')
        const latlng = [lat, long]
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latlng);
    })

//get Location
$(document).on('click', '#btn-getloc', function(e) {
    e.preventDefault()
    if (control != null) {
            mymap.removeControl(control);
            control = null;
    }
    getLocation()
})

function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert('Geolocation is not supported by this browser')
        }
    }
    function showPosition(position) {
    const x = position.coords.latitude
    const y = position.coords.longitude
    const tt = [x, y]

    control = L.Routing.control({
        waypoints: [
            tt
        ],
        lineOptions: {
      styles: [{color: 'blue', opacity: 1, weight: 5}]
   },
    }).addTo(mymap);
    }


    var batas = L.geoJSON(batas, {
    style: function(feature) {
        switch (feature.properties.Id) {
            case '0': return {color: "#808000"};
        }
    }
}).addTo(mymap);

    // function printRating(skor) {
    //     let html = ''
    //     for (let i = 1; i <= skor; i++) {
    //         html += `<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
    //                                         xmlns="http://www.w3.org/2000/svg">
    //                                         <path
    //                                             d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
    //                                         </path>
    //                                     </svg>`
    //     }
    //     return html
    // }

    // function printSisa(sisa) {
    //     let html = ''
    //     for (let i = 0; i < sisa; i++) {
    //         html += `<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
    //                                         xmlns="http://www.w3.org/2000/svg">
    //                                         <path
    //                                             d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
    //                                         </path>
    //                                     </svg>`
    //     }
    //     return html
    // }

    function getDetailLokasi(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/detail_lokasi/' + id,
            success: function (response) {
                const lokasi = document.querySelector("#lokasi");
                lokasi.innerHTML = ` <div class="mt-2 h-30 border-2 border-gray-400 rounded-lg pr-2" style="width: 350px;">
    <img style="width: 720px !important;" class="min-h-80 object-cover px-1 py-1" src="/storage/${ response.img }">
    <h2 class="text-2sm font-bold mt-1 ml-3"> ${response.name} </h2>

    <div class="flex ml-2">
        <span class="ml-1 text-sm"> Location : ${response.location}</span>
    </div>
    <div class="flex  ml-2">
        <span class="ml-1  text-sm text-center"> Feature :  ${response.feature}</span>
    </div>
    <div class="flex  ml-2">
        <span class="ml-1  text-sm text-center"> Sub Feature :  ${response.sub_feature}</span>
    </div>
    <div class="stat mt-0 ">
                            <div class="flex justify-end">
                                <!-- The button to open modal -->
                                <button
                                    class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"> <a href="/detail/${response.id}">Detail</a></button>
                            </div>
                        </div>
        `
            }
        })
    }
    // $(document).on('click', '.btn-rute', function (e) {
    //     e.preventDefault()
    //     const lat = $(this).data('lat')
    //     const long = $(this).data('long')
    //     const latlng = [lat, long]
    //     control.spliceWaypoints(control.getWaypoints().length - 1, 1, latlng);
    // })
</script>
@endsection
