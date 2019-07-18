<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tag = Tag::all();
        if (count($tag) <= 0 ) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'tag Menghilang'
            ];

            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $tag,
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
        //
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
            'nama_tag' => 'required|min:10'
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

        $tag = new Tag;
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag,'-');
        $tag->save();

        //4. buat fungsi untuk menghendle semua inputan->dimasukkan kke table
        
        
        //5. menampilkan response
        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Tag Berhasil Ditambah'
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
        $tag = Tag::Find($id);
        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Tag Menghilang'
            ];

            return response()->json($response, 404);
        }

        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
        $tag->save();
        

        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Tag Ada'
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
        $tag = Tag::Find($id);
        $input = $request->all();

        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Gagal Update',
                'message' => 'Tag Menghilang'
            ];

            return response()->json($response, 404);
    }
    $validator = Validator::make($input,[
            'nama_tag' => 'required|unique:tags'
        ]);
     if ($validator->fails()){
            $response = [
                'success' => false,
                'data' => 'Validator Error',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);

        }
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
        $tag->save();


        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Nama Tag di Ubah'
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
        $tag = Tag::Find($id);

        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Tag Menghilang'
            ];

            return response()->json($response, 404);
    }

    $tag->delete();
    $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Tag dihapus'
        ];

        return response()->json($response, 200);
    }
}
