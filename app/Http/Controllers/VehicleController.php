<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Mostrar lista de vehículos con búsqueda y paginación
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $vehicles = Vehicle::when($search, function ($query) use ($search) {
                $query->where('placa', 'like', "%$search%")
                      ->orWhere('marca', 'like', "%$search%")
                      ->orWhere('modelo', 'like', "%$search%");
            })
            ->orderBy('id','desc')
            ->paginate(5);

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Mostrar formulario de registro
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Guardar vehículo
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|max:10',
            'marca' => 'required|max:100',
            'modelo' => 'required|max:100',
            'anio_fabricacion' => 'required|integer',
            'cliente_nombre' => 'required|max:100',
            'cliente_apellidos' => 'required|max:100',
            'cliente_documento' => 'required|max:20',
            'cliente_correo' => 'nullable|email',
            'cliente_telefono' => 'nullable|max:20',
        ]);

        try {

            Vehicle::create([
                'placa' => $request->placa,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'anio_fabricacion' => $request->anio_fabricacion,
                'cliente_nombre' => $request->cliente_nombre,
                'cliente_apellidos' => $request->cliente_apellidos,
                'cliente_documento' => $request->cliente_documento,
                'cliente_correo' => $request->cliente_correo,
                'cliente_telefono' => $request->cliente_telefono
            ]);

            return redirect()->route('vehicles.index')
                ->with('success','Vehículo registrado correctamente');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error','Ocurrió un error al registrar el vehículo')
                ->withInput();
        }
    }

    /**
     * Mostrar vehículo
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Actualizar vehículo
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'placa' => 'required|max:10',
            'marca' => 'required|max:100',
            'modelo' => 'required|max:100',
            'anio_fabricacion' => 'required|integer',
            'cliente_nombre' => 'required|max:100',
            'cliente_apellidos' => 'required|max:100',
            'cliente_documento' => 'required|max:20',
            'cliente_correo' => 'nullable|email',
            'cliente_telefono' => 'nullable|max:20',
        ]);

        try {

            $vehicle->update([
                'placa' => $request->placa,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'anio_fabricacion' => $request->anio_fabricacion,
                'cliente_nombre' => $request->cliente_nombre,
                'cliente_apellidos' => $request->cliente_apellidos,
                'cliente_documento' => $request->cliente_documento,
                'cliente_correo' => $request->cliente_correo,
                'cliente_telefono' => $request->cliente_telefono
            ]);

            return redirect()->route('vehicles.index')
                ->with('success','Vehículo actualizado correctamente');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error','Error al actualizar el vehículo')
                ->withInput();
        }
    }

    /**
     * Eliminar vehículo
     */
    public function destroy(Vehicle $vehicle)
    {
        try {

            $vehicle->delete();

            return redirect()->route('vehicles.index')
                ->with('success','Vehículo eliminado correctamente');

        } catch (\Exception $e) {

            return redirect()->route('vehicles.index')
                ->with('error','No se pudo eliminar el vehículo');
        }
    }
}