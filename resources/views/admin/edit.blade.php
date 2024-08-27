@extends('layouts.main')

@section('isi')
    <h1 class="text-2xl font-semibold font-sans ml-8 mt-4"> Edit Data</h1>

    <div class="mt-4 ml-8">
        <a href="/a_daftar">
            <button class="btn btn-sm btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                </svg>
                <span>Back</span>
            </button>
        </a>
    </div>

    @if (session()->has('pesan'))
        <div class="flex w-full max-w-sm ml-6 overflow-hidden bg-gray-100 rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500 dark:text-green-400">{{ session('pesan') }}</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200"></p>
                </div>
            </div>
        </div>
    @endif
    <form action="/a_daftar/{{ $daftar->id }}/" method="POST" enctype="multipart/form-data" class="ml-10">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-1 ml-10 mt-2">
            <div>
                <label class="label">
                    <span class="label-text ml-2 font-bold">Nama <span style="color:red"> &#x26B9;</span></span>
                </label>
                <input type="text" placeholder="Name" name="name" id="name"
                    class="input input-accent input-bordered w-80 @error('name') is-invalid @enderror"
                    value="{{ $daftar->name }}">
                @error('name')
                    <div class="text-red-700">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="md:grid-cols-1">
                <label class="label">
                    <span class=" label-text ml-2 font-bold"> Desa <span style="color:red"> &#x26B9;</span> </span>
                </label>
                <input type="text" placeholder="Location" id="location" name="location"
                    class="input input-bordered input-accent w-80 @error('location') is-invalid @enderror"
                    value="{{ $daftar->location }}">
                @error('location')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>

            <div class="md:grid-cols-1">
                <label class="label mt-4 ">
                    <span class="label-text ml-2 font-bold">Kecamatan <span style="color:red"> &#x26B9;</span></span>
                </label>
                <input type="text" placeholder="Sub Feature" id="sub_feature" name="sub_feature"
                    class="input input-bordered input-accent w-80 @error('sub_feature') is-invalid @enderror"
                    value="{{ $daftar->sub_feature }}">
                @error('sub_feature')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>
            <div>
                <label class="label mt-2">
                    <span class=" label-text ml-2 font-bold">Latitude <span style="color:red"> &#x26B9;</span></span>
                </label>
                <input type="text" placeholder="Latitude" name="latitude" id="latitude"
                    class="input input-accent input- w-80 @error('latitude') is-invalid @enderror"
                    value="{{ $daftar->latitude }}">
                @error('latitude')
                    <div class="text-red-700">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label class="label mt-2">
                    <span class="label-text ml-2 font-bold">Longitude <span style="color:red"> &#x26B9;</span></span>
                </label>
                <input type="text" placeholder="Longitude" name="longitude" id="longitude"
                    class="input input-accent input- w-80 @error('longitude') is-invalid @enderror"
                    value="{{ $daftar->longitude }}">
                @error('longitude')
                    <div class="text-red-700">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="md:grid-cols-1">
                <label class="label mt-4">
                    <span class=" label-text ml-2 font-bold"> Description <span style="color:red"> &#x26B9;</span> </span>
                </label>
                <textarea name="deskrip" id="deskrip" cols="30" rows="10"
                    class="input input-bordered input-accent h-40 w-80" @error('deskrip') is-invalid @enderror
                    value="{{ $daftar->deskrip }}">{{ $daftar->deskrip }}</textarea>
                @error('deskrip')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>
            <div class="mt-8 hidden">
                <h2>Fasilitas Wisata</h2>
                @foreach ($fasilitas as $f)
                    {{-- <option value="{{ $f['id'] }}">
            {{ $f['fasilitas'] }}</option> --}}
                    <label class="inline-flex items-center mt-3">
                        <input <?php
                        foreach ($daftar->fasilitas as $fas) {
                            if ($f['id'] == $fas) {
                                echo 'checked';
                            }
                        }
                        ?> name="fasilitas[]" type="checkbox" value="{{ $f['id'] }}"
                            class="form-checkbox h-5 w-5 text-green-600"><span class="ml-2 text-gray-700">
                            {{ $f['fasilitas'] }}</span>
                    </label>
                @endforeach
                @error('fasilitas')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>

            <div class="border border-dashed border-black relative mt-14 w-80 h-32">
                <label for="img" class="form-label inline-block mb-2 text-black"> Unggah banyak gambar : </label>
                <input type="file" name="photos[]" id="inputImage" multiple onchange="previewImage()"
                    class="@error('image') is-invalid @enderror block w-full text-sm mt-28 text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @error('photos')
                    <label class="text-red-700">{{ $message }}</label>
                @enderror
                <hr class="my-1">
            </div>
            <div class="">
                <div class="mb-3 w-60">
                    <label for="img" class="form-label inline-block mb-2 text-gray-700"> Choice Picture <span
                            style="color:red"> &#x26B9;</span></label>
                    <img name="img" class="img-preview" src="{{ asset('/storage/' . $daftar->img) }}">
                    <input name="img" onchange="previewImage()"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        type="file" id="img" @error('img') is-invalid @enderror>
                </div>
                @error('img')
                    <div>
                        <label class="text-red-700">{{ $message }}</label>
                    </div>
                @enderror
            </div>
            <div class="mt-40">
                <div class="flex justify-start">
                    <div class="flex ml-10 mb-10 justify-center">
                        <button
                            class="inline-block px-6 w-40 h-10 text-sm font-medium text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white active:bg-green-500 focus:outline-none focus:ring">
                            <span class="font-semibold text-lg">Update</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="ml-10 mt-20">
        <label for="img" class="form-label inline-block mb-4 text-black text-lg ml-6"> Delete Picture :
            <table class="text-sm text-left text-gray-500 dark:text-gray-400 mt-4">
                <thead class="mx-4 my-2 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-1">Picture</th>
                        <th class="px-6 py-1">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar->image as $image)
                        <tr>
                            <td class="px-6 py-4">
                                <img class="object-cover w-40 h-20 rounded shadow-lg mt-2"
                                    src="{{ asset('/storage/' . $image->image) }}" alt="" />
                            </td>
                            <td class="px-6 py-4">
                                <a href="/deletImage/{{ $image->id }}" class="btn-sm mr-2 pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection

<script type="text/javascript">
    const checkbox = document.getElementById("flexCheckIndeterminate");
    checkbox.indeterminate = true;

    function previewImage() {
        const img = document.querySelector('#img');
        const imgPreview = document.querySelector('img-preview');

        imgPreview.style.display = 'block';

        const oFrReader = new FileReader();
        ofReader.readAsDataURL(img.files[0]);

        oFrReader.onLoad = function(ofREvent) {
            imgPreview.src = ofREvent.target.result;
        }
    }

    function previewImage() {
        const img = document.querySelector('#img');
        const imgPreview = document.querySelector('img-preview');

        imgPreview.style.display = 'block';

        const oFrReader = new FileReader();
        ofReader.readAsDataURL(img.files[0]);

        oFrReader.onLoad = function(ofREvent) {
            imgPreview.src = ofREvent.target.result;
        }
    }
</script>
