@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Lista de Vehículos</h2>

    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">
        Registrar Vehículo
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Cliente</th>
            <th width="180">Acciones</th>
        </tr>
    </thead>

    <tbody>

    @forelse($vehicles as $vehicle)

    <tr>
        <td>{{ $vehicle->placa }}</td>
        <td>{{ $vehicle->marca }}</td>
        <td>{{ $vehicle->modelo }}</td>
        <td>{{ $vehicle->anio_fabricacion }}</td>
        <td>{{ $vehicle->cliente_nombre }} {{ $vehicle->cliente_apellidos }}</td>

        <td>

            <a href="{{ route('vehicles.edit',$vehicle->id) }}" class="btn btn-warning btn-sm">
                Editar
            </a>

            <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">
                    Eliminar
                </button>
            </form>

        </td>
    </tr>

    @empty

    <tr>
        <td colspan="6" class="text-center">No hay vehículos registrados</td>
    </tr>

    @endforelse

    </tbody>

</table>

@endsection