<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table="clientes";
    protected $primaryKey = "codigo";
    protected $fillable = [
        'nombre',
        'edad',
        'categoria'
    ];
    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        return Cliente::select('clientes.*', 'categorias.nombre AS categorias')
            ->join("categorias", "categorias.codigo", "=", "clientes.categoria")

            ->where('clientes.codigo', 'like', $search)
            ->orWhere('clientes.nombre', 'like', $search)
            ->orWhere('categorias.nombre', 'like', $search);
    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("clientes.$sortBy", $sort);

        return $query->get();

    }
}
