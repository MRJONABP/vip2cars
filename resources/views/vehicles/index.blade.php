@extends('layouts.app')

@section('content')

<div class="container">

<div class="card shadow">

<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

<div class="d-flex align-items-center">

<h4 class="mb-0">Lista de Vehículos</h4>

</div>

<a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm">
➕ Registrar
</a>

</div>


<div class="card-body">

{{-- MENSAJES --}}
@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif


{{-- BUSCADOR --}}
<form method="GET" action="{{ route('vehicles.index') }}" class="mb-4">

<div class="input-group">

<input
type="text"
name="search"
class="form-control"
placeholder="Buscar por placa, marca o modelo..."
value="{{ request('search') }}"
>

<button class="btn btn-dark">
🔍
</button>

</div>

</form>


<div class="table-responsive">

<table class="table table-striped table-hover align-middle">

<thead class="table-dark text-center">

<tr>
<th>Placa</th>
<th>Marca</th>
<th>Modelo</th>
<th>Año</th>
<th>Cliente</th>
<th width="120"></th>
</tr>

</thead>

<tbody>

@forelse($vehicles as $vehicle)

<tr>

<td class="text-center">
<strong>{{ $vehicle->placa }}</strong>
</td>

<td>{{ strtoupper($vehicle->marca) }}</td>

<td>{{ $vehicle->modelo }}</td>

<td class="text-center">{{ $vehicle->anio_fabricacion }}</td>

<td>
{{ $vehicle->cliente_nombre }}
{{ $vehicle->cliente_apellidos }}
</td>

<td class="text-center">

<div class="d-flex justify-content-center gap-2">

<a
href="{{ route('vehicles.edit',$vehicle->id) }}"
class="btn btn-warning btn-sm"
title="Editar"
>
✏
</a>

<form
action="{{ route('vehicles.destroy',$vehicle->id) }}"
method="POST"
>

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
title="Eliminar"
onclick="return confirm('¿Eliminar vehículo?')"
>
🗑
</button>

</form>

</div>

</td>

</tr>

@empty

<tr>
<td colspan="6" class="text-center text-muted">
No hay vehículos registrados
</td>
</tr>

@endforelse

</tbody>

</table>

</div>


{{-- PAGINACIÓN --}}
<div class="d-flex justify-content-center mt-4">

{{ $vehicles->links('pagination::bootstrap-5') }}

</div>

</div>

</div>

</div>

@endsection