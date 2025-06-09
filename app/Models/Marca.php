<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = "marcas";
    protected $primaryKey = "codigo";
    protected $fillable = [
        'nombre'
    ];

    public $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
    public static function getFilteredData($search) {
        $searchTerm = '%' . $search . '%';
        return Marca::select('marcas.*')

        ->where('marcas.codigo', 'like', $searchTerm)
        ->orWhere('marcas.nombre', 'like', $searchTerm);
    }

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage) {
        //se utiliza self para invocar metodo static dentro de la misma clase
        $query = self::getFilteredData($search);
        if ($itemsPerPage !== -1) {//validar para extraer todos los datos
            $query->skip($skip)
                  ->take($itemsPerPage);
        }
        $query->orderBy("marcas.$sortBy", $sort);

        return $query->get();

    }
}
