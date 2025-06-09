<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products/show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()//cargar formulario
    {
        $marcas = Marca::all();//extraer marcas
         return view('products/create')->with(['marcas'=>$marcas]);
    }

    public function validarCampos($request){
        return Validator::make($request->all(),[
            'nombre' => 'required',
            'precio' => 'required',
            'marca' => 'required'
        ], [
             'nombre.required' => 'Nombre es obligatorio',
            'precio.required' => 'Precio es obligatorio',
            'marca.required' => 'Marca es obligatorio'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $this->validarCampos($request);
        if($validacion->fails()){
            return response()->json([
                'code'=> 422,
                'message' => $validacion->messages()
            ],422);
        }else{
            $producto = Producto::create($request->all());
            return response()->json([
                 'code'=> 200,
                'message' => "Se creo el registro correctamente"
            ],200);
        }
    }

    /**
     * Display the specified resource. string $id
     */
    public function show(Request $request)
    {
        $itemsPerPage = $request->input('length', 10);//registros por pagina
        $skip = $request->input('start', 0);//obtener indice inicial

        //para extraer todos los registros
        if ($itemsPerPage == -1) {
            $itemsPerPage =  Producto::count();
            $skip = 0;
        }

        //config to ordering
        $sortBy = $request->input('columns.'.$request->input('order.0.column').'.data','codigo');
        $sort = ($request->input('order.0.dir') === 'asc') ? 'asc' : 'desc';

        //config to search
        $search = $request->input('search.value', '');
        $search = "%$search%";

        //get register filtered
        $filteredCount = Producto::getFilteredData($search)->count();
        $producto = Producto::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        //esto es para reutilizar la funcion para generar datatable en functions.js
        $producto = $producto->map(function ($producto) {
            $producto->path = 'products';//sirve para la url de editar y eliminar
            return $producto;
        });
        //se retorna una array estructurado para el data table
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => Producto::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marcas = Marca::all();
        $producto =  Producto::find($id);
        return view('products/update')->with(['marcas' =>$marcas,'producto'=> $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validacion = $this->validarCampos($request);
         if($validacion->fails()){
            return response()->json([
                'code'=> 422,
                'message' => $validacion->messages()
            ],422);
        }else{
            $producto = Producto::find($id);
            if($producto){
                $producto->update([
                    'nombre'=>$request->nombre,
                    'precio'=>$request->precio,
                    'marca'=>$request->marca
                ]);
                return response()->json([
                'code'=> 200,
                'message' => "Registro actualizado"
            ],200);
            }else{
                return response()->json([
                'code'=> 404,
                'message' => "Registro no encontrado"
            ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        if($producto){
            $producto->delete();
            return response()->json([
                'code'=> 200,
                'message' => "Registro actualizado"
            ],200);
        }else{
                return response()->json([
                'code'=> 404,
                'message' => "Registro no encontrado"
            ],404);
            }
    }
}
