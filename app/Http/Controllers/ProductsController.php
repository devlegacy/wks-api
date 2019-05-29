<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entities\Product;
use Illuminate\Support\Facades\Validator;
use File;
use Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'id' => 1,
            'name' => 'Laravel desde cero',
            'type' => 'Book',
            'price' => '40USD',
        ];

        return response()->json(['data' => $data, 'code' => Response::HTTP_OK]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function localStorage(Request $request) {
        $validator = Validator::make($request->json()->all(),[
            'name' => 'min:5',
            'filename' => 'max:500000', // Kilobytes
        ]);

        if($validator->fails()) {
            return response()->json([
                    'data' => $validator->errors(),
                    'code' =>  Response::HTTP_UNPROCESSABLE_ENTITY
                ]);
        }

        // subir archivo
        $filename = $request->file('filename');
        $ext = $filename->getClientOriginalExtension();
        $name = $filename->getFilename().".{$ext}";
        // guardar archivo
        Storage::disk('public')->put($name, File::get($filename));

        $product = new Product();
        $product->name = $request->name;
        $product->filename = $name;
        $product->save();

        return response()->json([
            'data' => 'Archivo creado',
            'code' =>  Response::HTTP_ACCEPTED
        ]);
    }

    public function amazonStorage(Request $request)
    {

    }
}
