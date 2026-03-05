<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Mostrar todos los vehículos
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Mostrar formulario para crear vehículo
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
        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')
                         ->with('success','Vehículo registrado correctamente');
    }

    /**
     * Mostrar vehículo (no lo usaremos mucho aquí)
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Mostrar formulario para editar
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
        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')
                         ->with('success','Vehículo actualizado');
    }

    /**
     * Eliminar vehículo
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')
                         ->with('success','Vehículo eliminado');
    }
}