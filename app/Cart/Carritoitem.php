<?php

namespace App\Cart;

use App\Models\Producto;

class Carritoitem
{
   /** @var Producto */
    protected $producto;
    /** @var int */
    protected $cantidad;
    
    /**
    * Constructor
    * @param Producto $producto
    */
    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
        $this->cantidad = 1;
        
    }
    
    /**
    * Retorna el subtotal del producto
    *
    * @return float|int
    */
    public function getSubtotal()
    {
        return $this->producto->precio * $this->cantidad;
    }
    
    /**
    * Retorna el producto
    *
    * return Producto
    */
    
    public function getProducto()
    {
        return $this->producto;
    }
    
    /**
    * Setea el producto
    *
    * @param Producto $producto
    */
    
    public function setProducto( Producto $producto)
    {
        $this->producto = $producto;
    }
    
    /**
    * Retorna la cantidad
    *
    * return int
    */
    
    public function getCantidad()
    {
        return $this->cantidad;
    }
    
    /**
    * Setea la cantidad
    *
    * @param int
    */
    
    public function setCantidad(int $cantidad)
    {
        $this->cantidad = $cantidad;
    }    
    
    
}