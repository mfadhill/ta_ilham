@extends('layouts.main')
@section('isi')


<div class="pt-10 bg-gray-100">
<p class="text-xl text-center font-bold"> Please contact one of the following person via email for any information, <br> questions or suggestions for this Web GIS.
 <br>Thank you.</p>
</div>
<div class="bg-gray-100 py-10 flex items-center justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  
      <!-- Pricing Card 1 -->
      <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 mx-3">
        <div class="p-1 bg-blue-200">
        </div>
        <div class="p-8">
          <h2 class="text-3xl font-bold text-gray-800 mb-3">Prof. Dr. Poline Bala</h2>
          <p class="text-gray-600 mb-3 text-xl font-bold">Director</p>
          <p class="text-gray-600 mb-3">Institute of Borneo Studies (IBS),</p>
          <p class="text-gray-600 mb-3">Faculty of Social Sciences & Humanities,</p>
          <p class="text-gray-600 mb-3">Universiti Malaysia Sarawak (UNIMAS),</p>
          <p class="text-gray-600 mb-5">94300 Kota Samarahan, Sarawak, MALAYSIA.</p>
        </div>
        <div class="p-2">
          <button
            class="w-60 ml-10 bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            email : bpoline@unimas.my
          </button>
        </div>
      </div>
  
      <!-- Pricing Card 2 -->
      <div class="bg-white rounded-sm overflow-hidden shadow-sm transition-transform transform hover:scale-105 mx-1">
        <div class="p-1 bg-green-200">
        </div>
        <div class="p-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-3">Prof. Gs. Dr. Tarmiji Masron</h2>
          <p class="text-gray-600 mb-3 text-xl font-bold">Coordinator</p>
          <p class="text-gray-600 mb-3 mt-">Centre for Spatially Integrated Digital Humanities (CSIDH),</p>
          <p class="text-gray-600 mb-3">Faculty of Social Sciences & Humanities,</p>
          <p class="text-gray-600 mb-3">Universiti Malaysia Sarawak (UNIMAS),</p>
          <p class="text-gray-600">94300 Kota Samarahan, Sarawak, MALAYSIA.</p>
        </div>
        <div class="p-6 pt-1">
          <button
            class="w-80 bg-green-500 text-white rounded-full px-4 py-2 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
            email : mtarmiji@unimas.my
          </button>
        </div>
      </div>
  
      {{-- card 3 --}}
      <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 mx-2">
        <div class="p-1 bg-blue-200">
        </div>
        <div class="p-8">
          <h2 class="text-3xl font-bold text-gray-800 mb-10">Dr. Nicholas Gani</h2>
          <p class="text-gray-600 mb-4">Faculty of Social Sciences & Humanities,</p>
          <p class="text-gray-600 mb-4">Universiti Malaysia Sarawak (UNIMAS),</p>
          <p class="text-gray-600 mb-12">94300 Kota Samarahan, Sarawak, MALAYSIA.</p>
        </div>
        <div class="p-4">
          <button
            class="w-70 bg-blue-500 ml-12 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            email : gnicholas@unimas.my
          </button>
        </div>
      </div>
      <!-- Pricing Card 3 -->
      <div class="bg-white rounded-sm overflow-hidden shadow-sm transition-transform transform hover:scale-105 mx-2">
        <div class="p-1 bg-green-200">
        </div>
        <div class="p-8">
          <h2 class="text-3xl font-bold text-gray-800 mb-10">Bryan Anderson Wis</h2>
          <p class="text-gray-600 mb-3 mt-">Institute of Borneo Studies (IBS),</p>
          <p class="text-gray-600 mb-3">Faculty of Social Sciences & Humanities,</p>
          <p class="text-gray-600 mb-3">Universiti Malaysia Sarawak (UNIMAS),</p>
          <p class="text-gray-600 mb-4">94300 Kota Samarahan, Sarawak, MALAYSIA.</p>
        </div>
        <div class="p-6">
          <button
            class="w-80 bg-green-500 text-white rounded-full px-4 py-2 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
            email : bryan.andersonwis@gmail.com
          </button>
        </div>
      </div>
       <!-- Pricing Card 3 -->
       <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 mx-2">
        <div class="p-1 bg-blue-200">
        </div>
        <div class="p-8">
          <h2 class="text-3xl font-bold text-gray-800 mb-10">Azizul Ahmad</h2>
          <p class="text-gray-600 mb-3 mt-">Centre for Spatially Integrated Digital Humanities (CSIDH),</p>
          <p class="text-gray-600 mb-3">Faculty of Social Sciences & Humanities,</p>
          <p class="text-gray-600 mb-3">Universiti Malaysia Sarawak (UNIMAS),</p>
          <p class="text-gray-600 ">94300 Kota Samarahan, Sarawak, MALAYSIA.</p>
        </div>
        <div class="p-4">
          <button
            class="w-70 bg-blue-500 ml-12 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            email: azizulahmad@gmail.com
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection
