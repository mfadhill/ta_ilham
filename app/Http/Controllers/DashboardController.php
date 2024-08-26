<?php

namespace App\Http\Controllers;

use App\Models\Arkeologi;
use App\Models\Daftar;
use App\Models\Dashboard;
use App\Models\Fasilitas;
use App\Models\Pengunjung;
use App\Models\Voting;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Wisatafasilitas;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arkeologi = Arkeologi::latest();
        if (request('search')) {
            $arkeologi->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('feature', 'like', '%' . request('search') . '%')
                ->orWhere('sub_feature', 'like', '%' . request('search') . '%');
        }
        return view('admin.a_daftar', [
            'title' => 'Data',
            'active' => 'a_daftar',
            'data' => $arkeologi->paginate(25),
        ]);
    }

    public function profile()
    {
        return view('admin.profil', [
            'title' => 'Profile',
        ]);
    }

    public function detail($id)
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

        $arr_image = [];
        $image = DB::table('image')
            ->join('arkeologis', 'image.id_lokasi', '=', 'arkeologis.id')
            ->select('image.*',)
            ->where('image.id_lokasi', '=', $daftar->id)
            ->get();

        // $arr_image = [];
        // $image = DB::table('image')
        //     ->join('arkeologis', 'image.id', '=', 'arkeologis.id')
        //     ->select('image.*',)
        //     ->where('image.id', '=', $daftar->id)
        //     ->get();

        foreach ($image as $img) {
            array_push($arr_image, $img->image);
        }

        $daftar->image = $arr_image;
        $daftar->fasilitas = $arr;

        $votes = DB::table('votings')
            ->select('skor')
            ->where('id_wisata', '=', $daftar->id)
            ->get();

        $jumlah_votes = count($votes);
        $total_skor = 0;

        foreach ($votes as $vote) {
            $total_skor += $vote->skor;
        }

        $skor = $jumlah_votes == 0 ? 0 : $total_skor / $jumlah_votes;
        $sisa = 5 - $skor;

        $daftar->skor = $skor;
        $daftar->sisa = $sisa;

        return view('admin.detail', [
            'title' => 'Detail',
            'active' => 'a_info',
            'daftar' => $daftar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftar = new daftar;
        return view('admin.addata', [
            'title' => 'Add Data',
            'fasilitas' => Fasilitas::all(),
            'active' => 'a_daftar',
            compact('daftar')
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
        $this->validate($request, [
            'id_lokasi' => 'digits:5',
            'name' => 'required',
            'location' => 'required',
            'sub_feature' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png',
        ]);

        $file_name = $request->img->getClientOriginalName();
        $image_path = $request->img->storeAs('thumbnail', $file_name);

        // Menyimpan data lokasi ke tabel arkeologi
        $lokasi = Arkeologi::create([
            'name' => $request->name,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'sub_feature' => $request->sub_feature,
            'deskrip' => $request->deskrip,
            'img' => $image_path,
        ]);

        // Menyimpan data gambar ke tabel image
        Image::create([
            'image' => $image_path,
            'id_lokasi' => $lokasi->id, // Pastikan kolom ini ada di tabel image
        ]);

        // Menyimpan data fasilitas wisata ke tabel wisatafasilitas
        $fasilitas = $request->fasilitas;
        if ($fasilitas) {
            foreach ($fasilitas as $fasilitas_id) {
                Wisatafasilitas::create([
                    'id_fasilitas' => $fasilitas_id,
                    'id_lokasi' => $lokasi->id,
                ]);
            }
        }

        return redirect('/a_daftar')->with('pesan', 'Data Berhasil di Tambah');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftar = Arkeologi::find($id);
        return view('admin.show', [
            'title' => 'Show Data',
            'active' => 'a_daftar',
            // 'fasilitas' => Fasilitas::all(),
            'daftar' => $daftar
        ]);
    }

    public function edit($id)
    {
        $daftar = Arkeologi::find($id);
        $arr = [];
        $fasilitas = DB::table('fasilitas_wisata')
            ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
            ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
            ->where('fasilitas_wisata.id_lokasi', '=', $daftar->id)
            ->get();
        foreach ($fasilitas as $fas) {
            array_push($arr, $fas->id);
        }
        $arr_image = [];
        $image = DB::table('image')
            ->join('arkeologis', 'image.id_lokasi', '=', 'arkeologis.id')
            ->select('image.*',)
            ->where('image.id_lokasi', '=', $daftar->id)
            ->get();
        foreach ($image as $img) {
            array_push($arr_image, $img);
        }
        $daftar->image = $arr_image;

        $daftar['fasilitas'] = $arr;
        return view('admin.edit', [
            'title' => 'Tambah Data',
            'active' => 'a_daftar',
            'fasilitas' => Fasilitas::all(),
            'daftar' => $daftar
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'feature' => 'required',
            'sub_feature' => 'required',
            'elevation' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'fasilitas'   => 'required',
            // 'kategori' => 'required',
            // 'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => '',
            // 'photos' => 'required'
        ]);

        $daftar = Arkeologi::find($id);
        if ($request->hasFile('img')) {
            $request->validate([
                'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);
            $file_name = $request->img->getClientOriginalName();
            $image = $request->img->storeAs('thumbnail', $file_name);
            $daftar->img = $image;
        }


        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');

            foreach ($photos as $photo) {
                $file_name = $photo->getClientOriginalName();
                $image = $photo->storeAs('thumbnail', $file_name);

                $image = Image::create(
                    [
                        'image' => $image,
                        'id_lokasi' => $id
                    ]
                );
                $image->save();
            }
        }
        $daftar->name = $request->name;
        $daftar->location = $request->location;
        $daftar->feature = $request->feature;
        $daftar->sub_feature = $request->sub_feature;
        $daftar->elevation = $request->elevation;
        $daftar->latitude = $request->latitude;
        $daftar->longitude = $request->longitude;
        $daftar->deskrip = $request->deskrip;
        DB::table('fasilitas_wisata')->where('id_lokasi', '=', $daftar->id)->delete();
        $fasilitas = $request->fasilitas;
        foreach ($fasilitas as $value) {
            Wisatafasilitas::create([
                'id_fasilitas' => 1,
                'id_lokasi' => $daftar->id
            ]);
        }
        // $daftar->deskripsi = $request->deskripsi;
        $daftar->save();

        return redirect('/a_daftar')->with('pesan', 'Data changed successfully');
    }

    public function destroy($id)
    {
        $daftar = Arkeologi::find($id);
        $daftar->delete();
        return redirect('/a_daftar')->with('pesan', 'Data has been successfully deleted');
    }

    public function destroyimage($id)
    {
        $daftar = Image::find($id);
        $daftar->delete();
        return back();
    }
}
