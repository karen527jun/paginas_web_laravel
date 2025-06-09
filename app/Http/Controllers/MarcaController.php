<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
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
        return view('marcas/show');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('marcas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function validarCampos($request){
        return Validator::make($request->all(),[
            'nombre' => 'required',
        ], [
             'nombre.required' => 'Nombre es obligatorio',
        ]);
    }

    public function store(Request $request)
    {
         $validacion = $this->validarCampos($request);
        if($validacion->fails()){
            return response()->json([
                'code'=> 422,
                'message' => $validacion->messages()
            ],422);
        }else{
            $marca = Marca::create($request->all());
            return response()->json([
                 'code'=> 200,
                'message' => "Se creo el registro correctamente"
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $itemsPerPage = $request->input('length', 10);//registros por pagina
        $skip = $request->input('start', 0);//obtener indice inicial

        //para extraer todos los registros
        if ($itemsPerPage == -1) {
            $itemsPerPage =  Marca::count();
            $skip = 0;
        }

        //config to ordering
        $sortBy = $request->input('columns.'.$request->input('order.0.column').'.data','codigo');
        $sort = ($request->input('order.0.dir') === 'asc') ? 'asc' : 'desc';

        //config to search
        $search = $request->input('search.value', '');
        $search = "%$search%";

        //get register filtered
        $filteredCount = Marca::getFilteredData($search)->count();
        $marca = Marca::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        //esto es para reutilizar la funcion para generar datatable en functions.js
        $marca = $marca->map(function ($marca) {
            $marca->path = 'marcas';//sirve para la url de editar y eliminar
            return $marca;
    });
    return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => Marca::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $marca]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca = Marca::find($id);
        return view('marcas/update')->with(['marca'=>$marca]);
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
            $marca = Marca::find($id);
            if($marca){
                $marca->update([
                    'nombre'=>$request->nombre,
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
        try {
            $marca = Marca::find($id);
        if($marca){
            $marca->delete();
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
        } catch (\Throwable $th) {
            return response()->json([
                'code'=> 404,
                'message' => "Registro no puede ser eliminado"
            ],404);
        }

    }
}
