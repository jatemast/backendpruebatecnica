<?php

 namespace App\Services;

use App\Models\Producto;

class ProductoService
{
    public function store(array $data): Producto
    {
        return Producto::create($data);
    }

    public function update(Producto $producto, array $data): Producto
    {
        $producto->update($data);
        return $producto;
    }

    public function delete(int $id): void
    {
        Producto::destroy($id);
    }
}
