<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use App\Services\ProductoService;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = Producto::paginate(10);
        return response()->json($productos);
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = $this->productoService->store($request->validated());
        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $updated = $this->productoService->update($producto, $request->validated());
        return response()->json($updated);
    }

    public function destroy($id)
    {
        $this->productoService->delete($id);
        return response()->json(null, 204);
    }
}
