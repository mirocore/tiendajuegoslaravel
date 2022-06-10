<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    
    protected $primaryKey = "id_producto";
    
    protected $fillable = ['nombre', 'descripcion', 'estado' ,'precio', 'stock', 'id_consola', 'id_marca', 'id_categoria', 'imagen'];
    
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }
    
    public function consola()
    {
        return $this->belongsTo(Consola::class, 'id_consola', 'id_consola');
    }    
    
    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'productos_tienen_generos',
        'id_producto', 'id_genero',
        'id_producto', 'id_genero');
    }
    
    public static $rules = [
        'nombre' => 'required|min:5|max:75',
        'precio' => 'required|numeric',
        'stock' => 'required|numeric',
        'estado' => 'required|int',
        'id_categoria' => 'required|exists:categorias',
        'imagen' => 'mimes:jpeg,png,jpg',
    ];
    
    public static $messages = [
        'nombre.required' => 'El campo nombre no puede ir vacío.',
        'nombre.min' => 'El mínimo es de 5 caracteres',
        'nombre.max' => 'El máximo es de 75 caracteres',
        'precio.required' => 'El campo precio no puede ir vacío.',
        'precio.numeric' => 'El campo precio debe ser un número.',
        'stock.required' => 'El campo stock no puede ir vacío.',
        'stock.numeric' => 'El campo stock debe ser un número.',
        'estado.required' => 'El campo estado no puede ir vacío.',
        'estado.int' => 'El id debe ser un número entero .',
        'id_categoria.required' => 'Categoría no puede ir vacío.',
        'id_categoria.int' => 'Opción no existente .',
        'id_categoria.exists' => 'La categoria no existe en los registros.',  
        'imagen.mimes' => 'El formato de la imagen debe ser jpg, jpeg o png.', 
    ];
    
    
}
