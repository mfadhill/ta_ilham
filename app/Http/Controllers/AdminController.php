<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Arkeologi;
use App\Models\Daftar;
use App\Models\Fasilitas;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $daftar = Arkeologi::latest()->paginate(6);
   
        return view('admin.a_home', [
            'title' => 'Home',
            'active' => 'a_home',
            'data' => $daftar,
        ]);
    }

    public function maps()
    {
        $daftar = DB::table('arkeologis')
            ->paginate(4);
        if (request('search')) {
            $daftar = DB::table('arkeologis')
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('feature', 'like', '%' . request('search') . '%')
                ->orWhere('sub_feature', 'like', '%' . request('search') . '%')
                ->paginate(4);
        }
        foreach ($daftar as $value) {
            $arr = [];
            $fasilitas = DB::table('fasilitas_wisata')
                ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
                ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
                ->where('fasilitas_wisata.id_lokasi', '=', $value->id)
                ->get();
            foreach ($fasilitas as $fas) {
                array_push($arr, $fas->fasilitas);
            }
            $votes = DB::table('votings')
                ->select('skor')
                ->where('id_wisata', '=', $value->id)
                ->get();
            $jumlah_votes = count($votes);
            $total_skor = 0;
            foreach ($votes  as $vote) {
                $total_skor += $vote->skor;
            }
            if ($jumlah_votes == 0) {
                $jumlah_votes = 1;
            }
            $skor = $total_skor / $jumlah_votes;
            $sisa = 5 - $skor;
            $value->fasilitas = $arr;
            $value->skor = $skor;
            $value->sisa = $sisa;
        }

        return view('admin.a_maps', [
            'title' => 'Map',
            'daftar' => $daftar,
            'fasilitas' => Fasilitas::all(),
            'active' => 'a_maps'

        ]);
    }
    public function detail_lokasi($id)
    {
        $daftar = Arkeologi::find($id);
        $arr = [];
        $fasilitas = DB::table('fasilitas_wisata')
            ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
            ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
            ->where('fasilitas_wisata.id_lokasi', '=', $daftar->id)
            ->get();
        foreach ($fasilitas as $fas) {
            array_push($arr, $fas->fasilitas);
        }
        $daftar['fasilitasString'] = implode(", ", $arr);
        $daftar['fasilitas'] = $arr;
        $votes = DB::table('votings')
            ->select('skor')
            ->where('id_wisata', '=', $daftar->id)
            ->get();
        $jumlah_votes = count($votes);
        $total_skor = 0;
        foreach ($votes  as $vote) {
            $total_skor += $vote->skor;
        }
        if ($jumlah_votes == 0) {
            $jumlah_votes = 1;
        }
        $skor = $total_skor / $jumlah_votes;
        $sisa = 5 - $skor;
        $daftar['skor'] = $skor;
        $daftar['sisa'] = $sisa;
        return response($daftar, 200);
    }
    public function rute()
    {
        return view('admin.a_rute', [
            'title' => 'Rute',
            'active' => 'rute'
        ]);
    }

    public function jsonForSearch()
    {
        $data = Arkeologi::all();
        return response($data, 200);
    }


    public function json()
    {
        $features = Arkeologi::all();

        foreach ($features as $key => $value) {
            $features[$key] = [
                'type' => 'Feature',
                'properties' => [
                    'name' => $value['name'],
                    'location' => $value['location'],
                    'feature' => $value['feature'],
                    'sub_feature' => $value['sub_feature'],
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value['longitude'], $value['latitude']]
                ]
            ];
        }
        $response = [
            'type' => 'FeatureCollection',
            'features' => $features

        ];
        return response($response, 200);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('admin.a_contact', [
            'title' => 'Contact',
            'active' => 'a_contact',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}