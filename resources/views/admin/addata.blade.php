@extends('layouts.main')
@section('isi')
<h1 class="text-2xl font-semibold font-sans ml-20 mt-4"> Add Data</h1>

<div class="mt-4">
    <a href="/a_daftar" class="ml-28">
        <button class="btn btn-sm btn-outline btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
            </svg>
            <span class="ml-1">Back</span>
        </button>
    </a>
</div>

@if(session()->has('pesan'))
    <div class="flex w-full max-w-sm ml-6 overflow-hidden bg-gray-100 rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center justify-center w-12 bg-green-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
            </svg>
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span
                    class="font-semibold text-green-500 dark:text-green-400">{{ session('pesan') }}</span>
                <p class="text-sm text-gray-600 dark:text-gray-200"></p>
            </div>
        </div>
    </div>
@endif
<div class="grid md:grid-cols-2 sm:grid-cols-1 gap-4">
    <div class="">
        <form action="/a_daftar" method="post" enctype="multipart/form-data" class="ml-10">
            @csrf
            <div class="grid md:grid-cols-2 sm:grid-cols-1 ml-4 mt-2">
                <div class="md:grid-cols-1">
                    <label class="label w-60">
                        <span class="label-text ml-2 font-bold">Name <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="Name" name="name" id="name"
                        class="input input-accent input-bordered w-60 @error('name')  @enderror" autofocus
                        value={{ old('name') }}>
                    @error('name')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="md:grid-cols-1">
                    <label class="label">
                        <span class=" label-text ml-2 font-bold"> Desa <span style="color:red"> &#x26B9;</span> </span>
                    </label>
                    <input type="text" placeholder="Desa" id="location" name="location"
                        class="input input-bordered input-accent w-60 @error('location') is-invalid @enderror"
                        value={{ old('location') }}>
                    @error('location')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                {{-- <div class="md:grid-cols-1">
                    <label class="label mt-4">
                        <span class=" label-text ml-2 font-bold"> Feature <span style="color:red"> &#x26B9;</span> </span>
                    </label>
                    <input type="text" placeholder="Feature" id="feature" name="feature"
                        class="input input-bordered input-accent w-60 @error('feature') is-invalid @enderror"
                        value={{ old('feature') }}>
                    @error('feature')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div> --}}
                {{-- <div class="md:grid-cols-1">
                    <label class="label mt-4 ">
                        <span class="label-text ml-2 font-bold">Feature <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <select name="feature" id="feature" class="select max-w-xs select-accent w-60">
                        <option value="Megalith"> Megalith </option>
                    </select>
                    @error('feature')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div> --}}
                <div class="md:grid-cols-1">
                    <label class="label mt-4 ">
                        <span class="label-text ml-2 font-bold">Kecamatan <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="Kecamatan" id="sub_feature" name="sub_feature"
                    class="input input-bordered input-accent w-60 @error('sub_feature') is-invalid @enderror"
                    value={{ old('sub_feature') }}>
                    @error('sub_feature')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                {{-- <div class="md:grid-cols-1">
                    <label class="label mt-4">
                        <span class=" label-text ml-2 font-bold"> Elevation <span style="color:red"> &#x26B9;</span> </span>
                    </label>
                    <input type="text" placeholder="Elevation" id="elevation" name="elevation"
                        class="input input-bordered input-accent w-60 @error('elevation') is-invalid @enderror"
                        value={{ old('elevation') }}>
                    @error('elevation')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                --}}
                <div class="">
                    <label class="label mt-4">
                        <span class=" label-text ml-2 font-bold">Latitude<span style="color:red"> &#x26B9;</span> </span>
                    </label>
                    <input type="text" placeholder="3.567......" name="latitude" id="latitude"
                        class="input input-bordered input-accent input- w-60 @error('latitude') is-invalid @enderror"
                        value={{ old('latitude') }}>
                    @error('latitude')
                        <div>
                            <label class="text-red-700">{{ $message }} &#x26B9;</label>
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label class="label mt-4">
                        <span class="label-text ml-2 font-bold">Longitude <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="115.543....." name="longitude" id="longitude"
                        class="input input-bordered input-accent input- w-60 @error('longitute') is-invalid @enderror"
                        value={{ old('longitude') }}>
                    @error('longitude')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="label mt-0">
                        <span class=" label-text ml-2 font-bold">Description</span>
                    </label>
                    <textarea name="deskrip" id="deskrip" placeholder="Description" cols="30" rows="4"
                        class="input input-bordered input-accent h-40 w-60 @error('deskrip') is-invalid @enderror"
                        value={{ old('deskrip') }}></textarea>
                    @error('deskrip')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="relative bordered">
                    <label for="image" class=" mr-4"> Select image for front view : <span style="color:red"> &#x26B9;</span><br> <span class="font-sm text-sm" style="color: red">Recomended image landscape</span></label>
                    <div class="">
                        <div class="max-w-1/3 h-20 rounded-lg ">
                            <div class="items-center justify-center w-full">
                                <input type="file" id="img" name="img"
                                    class="flex h-10 mt-2 ml-6 @error('img') is-invalid @enderror"
                                    value={{ old('img') }}>
                            </div>
                        </div>
                    </div>
                    @error('img')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="">
                    <div class="flex ml-14 mb-8 mt-4">
                        <button
                            class="inline-block rounded border border-green-600 px-8 py-3 text-sm font-medium text-green-600 hover:bg-green-600 hover:text-white focus:outline-none focus:ring active:bg-green-500">
                            <span class="font-semibold text-lg">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-8">
        <p class="mb-2 font-semibold"> Drag the blue marker to the location of the megalith you want to add </p>
        <div id="mapid"></div>
    </div>
</div>

<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script type="text/javascript" src="js/kec.js"> </script>
<script>

    var curLocation=[0,0];
    if(curLocation[0]==0 && curLocation[1]==0){
        curLocation =[4.613042410908224, 96.92072810504004];
    }
    let latLng = [4.613042410908224, 96.92072810504004];
    var mymap = L.map('mapid').setView(latLng, 12);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
    var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });
    mymap.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable : 'true'
        }).bindPopup(position).update();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng).keyup();
    });
        $("#latitude, #longitude").change(function(){
            var position =[parseInt($("#latitude").val()), parseInt($("#longitude").val())];
            marker.setLatLng(position,{
                draggable : 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });

    mymap.addLayer(marker);
    

</script>

@endsection