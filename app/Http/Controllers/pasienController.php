<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if(strlen($katakunci)){
            $data = pasien::where('nama', 'like', "%$katakunci%")
            ->orWhere('alamat', 'like', "%$katakunci%")
            ->orWhere('usia', 'like', "%$katakunci%")
            ->orWhere('jk', 'like', "%$katakunci%")
            ->orWhere('riwayat', 'like', "%$katakunci%")
            ->orWhere('poli', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = pasien::orderBy('nama','desc')->paginate($jumlahbaris);
        }
        
        return view('pasien.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        Session::flash('usia', $request->usia);
        Session::flash('jk', $request->jk);
        Session::flash('riwayat', $request->riwayat);
        Session::flash('poli', $request->poli);

        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'usia'=>'required|numeric',
            'jk'=>'required',
            'riwayat'=>'required',
            'poli'=>'required'
        ],[
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'usia.required'=>'Usia wajib diisi',
            'jk.required'=>'Jenis Kelamin wajib diisi',
            'riwayat.required'=>'Riwayat Penyakit wajib diisi',
            'poli.required'=>'Poli wajib diisi',
        ]);
        $data = [
            'id_pasien'=>$request->id_pasien,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'usia'=>$request->usia,
            'jk'=>$request->jk,
            'riwayat'=>$request->riwayat,
            'poli'=>$request->poli,
            ];
            pasien::create($data);
            return redirect()->to('pasien')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pasien::where('id_pasien', $id)->first();
        return view('pasien.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'usia' => 'required|numeric',
            'jk' => 'required',
            'riwayat' => 'required',
            'poli' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'usia.required' => 'Usia wajib diisi',
            'jk.required' => 'Jenis Kelamin wajib diisi',
            'riwayat.required' => 'Riwayat Penyakit wajib diisi',
            'poli.required' => 'Poli wajib diisi',
        ]);
        pasien::where('id_pasien', $id)
            ->update([
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'usia' => $request->input('usia'),
                'jk' => $request->input('jk'),
                'riwayat' => $request->input('riwayat'),
                'poli' => $request->input('poli'),
            ]);
    
        return redirect()->to('pasien')->with('success', 'Berhasil update kegiatan');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pasien::where('id_pasien', $id)->delete();
        return redirect()->to('pasien')->with('success', 'Berhasil delete data');
    }
}
