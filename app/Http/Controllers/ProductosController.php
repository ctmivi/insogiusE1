<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;

class ProductosController extends Controller
{
    public function listado()
    {
        $datos = [];
        $datos['productos'] = Productos::all(); // Cambiado de $datos['productos'] a $datos['preductos'] para ser más descriptivo
        return view('productos.listado')->with($datos);
    }

    public function formulario(Request $r, $id = 0)
    {
        $datos = [];

        if ($id == 0) {
            $datos['operacion'] = 'Agregar';
            $productos = new Productos();
            $productos->id = 0;
        } else {
            $datos['operacion'] = 'Modificar';
            $productos = Productos::find($id);
        }

        $datos['productos'] = $productos;
        return view('productos.formulario')->with($datos);
    }

    public function operacion(Request $r)
    {
        $datos = $r->all();
        $archivo = $r->file('foto');

        switch ($datos['operacion']) {
            case 'Agregar':
                $productos = new Productos();
                $productos->nombre = $datos['nombre'];
                $productos->foto = ''; // No sé si necesitas esto aquí

                $productos->save();

                if ($r->hasFile('foto')) {
                    $nombre_archivo = 'foto-' . $productos->id . '.' . $archivo->getClientOriginalExtension();
                    $archivo_subido = $archivo->storeAs('foto', $nombre_archivo);
                    $productos->foto = $nombre_archivo;
                    $productos->save();
                }
                break;

            case 'Modificar':
                $productos = Productos::find($datos['id']);
                $productos->nombre = $datos['nombre'];

                if ($r->hasFile('foto')) {
                    if ($productos->foto !== '') {
                        Storage::delete('foto/productos' . $productos->foto);
                    }

                    $nombre_archivo = 'foto-' . $productos->id . '.' . $archivo->getClientOriginalExtension();
                    $archivo_subido = $archivo->storeAs('foto', $nombre_archivo);
                    $productos->foto = $nombre_archivo;
                }

                $productos->save();
                break;

            case 'Eliminar':
                $productos = Productos::find($datos['id']);

                if ($productos->foto !== '') {
                    Storage::delete('foto/productos' . $productos->foto);
                }

                $productos->delete();
                break;
        }

        return redirect()->route('index_productos');
    }

    public function ver_image($nombre_foto)
    {
        //storage_path es una funcion de laravel que devuelve la ruta real del archivo dentro
        //de la carpeta storage
        $path = storage_path('app/foto/' . $nombre_foto);
        if (!File::exists($path)){
            //error 404 significa que no encontro el archivo
            abort(404);
        }
        //dd($path);
        //recuperar el contenido del archivo
        $file = File::get($path);
        //recupero el tipo de archivo
        $type = File::mimeType($path);
        //dd($type);
        //devuelvo el archivo
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productos $productos)
    {
        //
    }
}
