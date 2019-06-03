<?php

namespace App;

use Illuminate\Support\Facades\Log;

class InvoiceSession
{
    private $content = [];

    public function __construct() {
    }
    
    public function add($id ,$name, $quantity, $price, $attributes)
    {
        if(array_key_exists($id , $this->content)){
            return false;
        }
        else{
            $this->content[$id] = [
                'id' => $id,
                'name' => $name,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $quantity*$price,
                'attributes' => $attributes
            ];
            return true;
        }
    }

    public function update($id, $data)
    {
        if(array_key_exists($id , $this->content)){
            foreach ($data as $key => $value) {
                if(array_key_exists($key,$this->content[$id])){
                    $this->content[$id][$key] = $value;
                }
            }
        }
    }
    
    public function remove($id)
    {
        if(array_key_exists($id , $this->content)){
            unset($this->content[$id]);
        }
    }

    public function get($id)
    {
        if(array_key_exists($id , $this->content)){
            return $this->content[$id];
        }
    }

    public function getContent()
    {
        return $this->content;
    }

    public function isEmpty()
    {
        return empty($this->content);
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->content as $key => $value) {
            $total += $value['quantity']*$value['price'];
        }
        return $total;
    }

    public function getTotalQuantity()
    {
        $totalQty = 0;
        foreach ($this->content as $key => $value) {
            $totalQty += $value['quantity'];
        }
        return $totalQty;
    }
}