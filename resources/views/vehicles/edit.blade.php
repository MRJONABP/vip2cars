@extends('layouts.app')

@section('content')

<div class="card shadow">
<div class="card-body">

<h3 class="mb-4">Editar Vehículo</h3>

<form action="{{ route('vehicles.update',$vehicle->id) }}" method="POST">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Placa</label>
<input type="text" name="placa" class="form-control" value="{{ $vehicle->placa }}" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Marca</label>
<input type="text" name="marca" class="form-control" value="{{ $vehicle->marca }}" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Modelo</label>
<input type="text" name="modelo" class="form-control" value="{{ $vehicle->modelo }}" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Año de fabricación</label>
<input type="number" name="anio_fabricacion" class="form-control" value="{{ $vehicle->anio_fabricacion }}" required>
</div>

<hr class="mt-3 mb-3">

<h5>Datos del Cliente</h5>

<div class="col-md-6 mb-3">
<label class="form-label">Nombre</label>
<input type="text" name="cliente_nombre" class="form-control" value="{{ $vehicle->cliente_nombre }}" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Apellidos</label>
<input type="text" name="cliente_apellidos" class="form-control" value="{{ $vehicle->cliente_apellidos }}" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Documento</label>
<input type="text" name="cliente_documento" class="form-control" value="{{ $vehicle->cliente_documento }}" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Correo</label>
<input type="email" name="cliente_correo" class="form-control" value="{{ $vehicle->cliente_correo }}">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Teléfono</label>
<input type="text" name="cliente_telefono" class="form-control" value="{{ $vehicle->cliente_telefono }}">
</div>

</div>

<div class="mt-3">

<button class="btn btn-warning">
Actualizar
</button>

<a href="{{ route('vehicles.index') }}" class="btn btn-secondary">
Cancelar
</a>

</div>

</form>

</div>
</div>

@endsection