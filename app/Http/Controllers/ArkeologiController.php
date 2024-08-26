<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arkeologi;
use App\Models\fasilitas;
use Illuminate\Support\Facades\DB;

class ArkeologiController extends Controller
{
    public function home()
    {
       
        $data = Arkeologi::latest()->paginate(9);
   
        return view('user.home', [
            'title' => 'Home',
            'active' => 'home',
            'data' => $data,
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
        return view('user.map', [
            'title' => 'Maps',
            'active' => 'maps',
            // 'fasilitas' => Fasilitas::all(),
            'daftar' => $daftar,
            // 'arkeologi' => $arkeologi->paginate(2)
        ]);
    }
    public function info()
    {
        $arkeologi = DB::table('arkeologis')
            ->paginate(9);
        if (request('search')) {
            $arkeologi = DB::table('arkeologis')
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('feature', 'like', '%' . request('search') . '%')
                ->orWhere('sub_feature', 'like', '%' . request('search') . '%')
                ->paginate(15);
        }
        foreach ($arkeologi as $value) {
            $arr = [];
            $fasilitas = DB::table('fasilitas_wisata')
                ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
                ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
                ->where('fasilitas_wisata.id_lokasi', '=', $value->id)
                ->get();
            foreach ($fasilitas as $fas) {
                array_push($arr, $fas->fasilitas);
            }
            $value->fasilitas = $arr;
        }
        return view('user.info', [
            'title' => 'Information',
            'active' => 'info',
            'daftar' => $arkeologi,
        ]);
    }

    public function contact() 
    {
        return view('user.contact',[
        'title' => 'contact',
        'active' => 'contact',
        ]);
}

    public function json()
    {
        if (request('search')) {
            $features = DB::table('arkeologis')
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('feature', 'like', '%' . request('search') . '%')
                ->orWhere('sub_feature', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $features = DB::table('arkeologis')
                ->get();
        }
        foreach ($features as $key => $value) {
            $json_features[] = [
                'type' => 'Feature',
                'properties' => [
                    'id' => $value->id,
                    'name' => $value->name,
                    'location' => $value->location,
                    'feature' => $value->feature,
                    'sub_feature' => $value->sub_feature,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value->longitude, $value->latitude]
                ]
            ];
        }
        $response = [
            'type' => 'FeatureCollection',
            'features' => $json_features

        ];
        return response($response, 200);
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

    public function detail($id)
    {
        $arkeologi = arkeologi::find($id);

        $arr = [];
        $fasilitas = DB::table('fasilitas_wisata')
            ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
            ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
            ->where('fasilitas_wisata.id_lokasi', '=', $arkeologi->id)
            ->get();
        foreach ($fasilitas as $fas) {
            array_push($arr, $fas->fasilitas);
        }
        $arr_image = [];
        $image = DB::table('image')
            ->join('arkeologis', 'image.id_lokasi', '=', 'arkeologis.id')
            ->select('image.*')
            ->where('image.id_lokasi', '=', $arkeologi->id)
            ->get();
        foreach ($image as $img) {
            array_push($arr_image, $img->image);
        }
        $arkeologi->image = $arr_image;
        $votes = DB::table('votings')
            ->select('skor')
            ->where('id_wisata', '=', $arkeologi->id)
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
        $arkeologi->fasilitas = $arr;
        $arkeologi->skor = $skor;
        $arkeologi->sisa = $sisa;

        // dd($arkeologi);
        // $image = Image::all();
        return view('user.detail', [
            'title' => 'Detail',
            'active' => 'info',
            // 'images' => $image,
            'arkeologi' => $arkeologi
        ]);
    }

    public function rute()
    {
        return view('user.rute', [
            'title' => 'Rute',
            'active' => 'rute',
            'arkeologi' => Arkeologi::all(),
        ]);
    }

    // public function contact(){
    //     return view('user.contact',[
    //         'title' => 'Contact',
    //         'active' => 'contact',
    //         'arkeologis' => Arkeologi::all(),
    //     ]);
    // }
    public function test(){
        return view('user.test',[
            'title' => 'test',
            'active' => 'test',
            // 'arkeologis' => Arkeologi::all(),
        ]);
    }
    public function updaftar()
    {
    }

    public function create()
    {
        //
    }
}