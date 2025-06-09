<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //variables

    protected $table="productos";
    protected $primaryKey = "codigo";
    protected $fillable = [
        'nombre',
        'precio',
        'marca'
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Producto::select('productos.*', 'marcas.nombre AS marca')
            ->join("marcas", "marcas.codigo", "=", "productos.marca")

            ->where('productos.codigo', 'like', $search)
            ->orWhere('productos.nombre', 'like', $search)
            ->orWhere('marcas.nombre', 'like', $search);
    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("productos.$sortBy", $sort);

        return $query->get();

    }
}
