<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        if (count($artikel) <= 0 ) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Artikel Menghilang'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'Berhasil'
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $artikel = Artikel::all();
        if (count($artikel) <= 0 ) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Artikel Menghilang'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'Berhasil'
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.Tampung semua inputan ke $input 
        $input = $request->all();

        //2. Buat validasi ditampung ke $validator
        $validator = Validator::make($input,[
            'judul' => 'required|min:10'
        ]);

        //3. Chek validasi
        if ($validator->fails()){
            $response = [
                'success' => false,
                'data' => 'Validator Error',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }
        //4. buat fungsi untuk menghendle semua inputan->dimasukkan kke table
        $artikel = Artikel::create($input);
        
        //5. menampilkan response
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'Artikel Berhasil Ditambah'
        ];

        //6. Tampilkan hasil
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::Find($id);
        if (!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Artikel Menghilang'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'Artikel Ada'
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::Find($id);
        $input = $request->all();

        if (!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Gagal Update',
                'message' => 'Artikel Menghilang'
            ];

            return response()->json($response, 404);
    }
    $validator = Validator::make($input,[
            'judul' => 'required|min:10'
        ]);

     if ($validator->fails()){
            $response = [
                'success' => false,
                'data' => 'Validator Error',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);

        }
        $artikel->nama = $input['judul'];
        $artikel->save();

        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'Nama Artikel di Ubah'
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::Find($id);

        if (!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Artikel Menghilang'
            ];

            return response()->json($response, 404);
    }

    $artikel->delete();
    $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'Artikel dihapus'
        ];

        return response()->json($response, 200);
    }
}
