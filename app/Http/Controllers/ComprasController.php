<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use Illuminate\Http\Request;
use App\Models\DetalleCompra;
use App\Models\User;

class ComprasController extends Controller
{
    public function crearCompra(Request $request)
    {
        // Paso 1: Verificar si el usuario está autenticado
        if (auth()->check()) {
            // Obtener el ID del usuario autenticado
            $usuarioId = auth()->user()->id;

            // Paso 2: Solicitud de Información de Detalle (?)
            $detallesCompra = $request->input('detallecompra');

            // Paso 3: Almacenamiento en la Tabla de Compra
            $compra = Compras::create([
                'id_usuario' => $usuarioId,
                'total' => $request->input('total'),
                'estado' => 1, // Por defecto
            ]);

            // Paso 4: Obtención del ID de Compra
            $compraId = $compra->id;

            // Paso 5: Almacenamiento en la Tabla de Detalle
            foreach ($detallesCompra as $detalle) {
                DetalleCompra::create([
                    'id_producto' => $detalle['id_producto'],
                    'id_compra' => $compraId,
                    'cantidad' => $detalle['cantidad'],
                    'precio' => $detalle['precio'],
                ]);
            }

            // Paso 6: Respuesta
            return response()->json(['id_compra' => $compraId]);
        } else {
            // Manejar el caso en el que el usuario no está autenticado
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }


    public function actualizarEstadoCompra(Request $request)
{
    $idCompra = $request->input('id_compra');
    $estado = $request->input('estado');

    $compra = Compras::find($idCompra);

    if (!$compra) {
        return response()->json(['mensaje' => 'Compra no encontrada'], 404);
    }

    // Verificar si la compra ya está en proceso (estado diferente de 1 - En proceso)
    if ($compra->estado != 1) {
        return response()->json(['mensaje' => 'La compra ya no está en proceso, no se pueden agregar más productos'], 400);
    }

    // Actualizar estado de la compra
    $compra->estado = $estado;
    $compra->save();

    // Si la compra es exitosa, realizar acciones adicionales
    if ($estado == 2) {
            // Recorrer los detalles de la compra
            foreach ($compra as $detalle) {
                // Registrar en la tabla de usuario el nuevo producto comprado
                $usuario = User::find($compra->id_usuario);
                $datos = $usuario->datos; // No es necesario decodificar nuevamente
                array_push($datos, ['id_producto' => $detalle->id_producto]);
                $usuario->datos = $datos;
                $usuario->save();
            }
        }

    return response()->json(['mensaje' => 'Estado de compra actualizado']);
}




    

    public function index()
    {
        //almacenar en variable todo y regresar en json
        //$compras = Compras::all();
        //return response()->json($compras);
    }

    public function store(Request $request)
    {
        //reglas de campo, se agrgega aquí los ABCC (create)
    }

    public function show(compras $compras)
    {
        //retorna en json un status y una info en la columna
        //return response()->json(['status' => true, 'data' => $compras]);
    }

    public function update(Request $request, compras $compras)
    {
        //reglas de campo, se agrgega aquí los ABCC (update)
    }

    public function destroy(compras $compras)
    {
        //función de eliminar
        //$compras->delete();
        //return response->json([
            //'status' => true,
            //'message' => 'Compras deleted succesfully'
        //]);
    }
}
