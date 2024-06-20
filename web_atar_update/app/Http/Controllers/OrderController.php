<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan melalui form
        $request->validate([
            'nama_lengkap' => 'required',
            'nomor_telepon' => 'required',
            'tanggal_order' => 'required|date',
            'pilih_paket' => 'required|in:paket 5kg,paket 10kg,paket 15kg',  // Menambahkan validasi untuk paket
            'jumlah_pair_pasang' => 'nullable|numeric',
            'expedisi' => 'required|in:JNE,Tiki,POS Indonesia', // Menambahkan validasi untuk expedisi
            'alamat' => 'required',
        ]);
        
    
        // Simpan data ke dalam database menggunakan model yang sesuai
        $order = new Order();
        $order->Nama_Pemesan = $request->nama_lengkap;
        $order->nomor_telfon = $request->nomor_telepon;
        $order->tanggal_order = $request->tanggal_order;
        $order->pilih_paket = $request->pilih_paket; 
        $order->jumlah_pair_pasang = $request->jumlah_pair_pasang;
        $order->expedisi = $request->expedisi;
        $order->alamat = $request->alamat;
        $order->save();
    
        // Redirect kembali ke halaman form dengan pesan sukses jika data berhasil disimpan
        return response()->json([
            'success' => true,
            'message' => 'Order berhasil !!, silahkan konfirmasi ke Nomor berikut +6289652731947'
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
