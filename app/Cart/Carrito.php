<?php

namespace App\Cart;

class Carrito
{
    
/** @var array|CarritoItem[] */
    protected $items = [];
     
    
    /**
     * Agrega un item al carrito.
     * Si el item es un producto que no existe, lo agrega.
     *
     * @param CarritoItem $nuevoItem
     * @return bool
     */
    public function addItem(CarritoItem $nuevoItem)
    {
        foreach($this->items as $item) {
            if($item->getProducto()->id_producto === $nuevoItem->getProducto()->id_producto) {
                $item->setCantidad($item->getCantidad() + 1);
                return true;
            }
        }
        
        $this->items[] = $nuevoItem;
        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function removeItem($id)
    {
        $this->items = array_filter($this->items, function($item) use($id) {
            /** @var CarritoItem $item */
            return $item->getProducto()->id_producto != $id;
        });
        return true;
    }

    /**
     * Elimina todos los items del carrito.
     */
    public function removeAll()
    {
        $this->items = [];
    }

    /**
     * Retorna el costo total del carrito.
     */
    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    /**
     * Retorna el item con el id_producto $id.
     * Si no existe, retorna null
     *
     * @param int $id
     * @return CarritoItem|null
     */
    public function getItem($id)
    {
        foreach($this->items as $item) {
            if($item->getProducto()->id_producto === $id) {
                return $item;
            }
        }
        return null;
    }

    /**
     * @return array|CarritoItem[]
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
    * Retorna la cantidad de objetos en el carrito
    * Incluyendo repeticiones
    *
    * @return int
    */
    
    public function getCantidadTotal()
    {
        $cantidadTotal = 0;
        foreach($this->items as $item){
            $cantidadTotal += $item->getCantidad();
        }
        return $cantidadTotal;
    }
    
}