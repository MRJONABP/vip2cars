@extends('layouts.app')

@section('content')

<div class="text-center mb-4">
</div>

<div class="card shadow">

<div class="card-header bg-dark text-white">
    <h4 class="mb-0">Editar Vehículo</h4>
</div>

<div class="card-body">

{{-- ERRORES DE VALIDACIÓN --}}
@if ($errors->any())
<div class="alert alert-danger">
<strong>Se encontraron errores:</strong>

<ul class="mb-0 mt-2">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>

</div>
@endif


<form action="{{ route('vehicles.update',$vehicle->id) }}" method="POST">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Placa</label>
<input
type="text"
name="placa"
class="form-control"
value="{{ old('placa',$vehicle->placa) }}"
required
>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Marca</label>
<input
type="text"
name="marca"
class="form-control"
value="{{ old('marca',$vehicle->marca) }}"
required
>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Modelo</label>
<input
type="text"
name="modelo"
class="form-control"
value="{{ old('modelo',$vehicle->modelo) }}"
required
>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Año de fabricación</label>
<input
type="number"
name="anio_fabricacion"
class="form-control"
value="{{ old('anio_fabricacion',$vehicle->anio_fabricacion) }}"
required
>
</div>

</div>


<hr class="mt-4 mb-3">

<h5 class="mb-3">Datos del Cliente</h5>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nombre</label>
<input
type="text"
name="cliente_nombre"
class="form-control"
value="{{ old('cliente_nombre',$vehicle->cliente_nombre) }}"
required
>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Apellidos</label>
<input
type="text"
name="cliente_apellidos"
class="form-control"
value="{{ old('cliente_apellidos',$vehicle->cliente_apellidos) }}"
required
>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Documento</label>
<input
type="text"
name="cliente_documento"
class="form-control"
value="{{ old('cliente_documento',$vehicle->cliente_documento) }}"
required
>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Correo</label>
<input
type="email"
name="cliente_correo"
class="form-control"
value="{{ old('cliente_correo',$vehicle->cliente_correo) }}"
>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Teléfono</label>
<input
type="text"
name="cliente_telefono"
class="form-control"
value="{{ old('cliente_telefono',$vehicle->cliente_telefono) }}"
>
</div>

</div>


<div class="mt-4 d-flex gap-2">

<button class="btn btn-warning">
Actualizar Vehículo
</button>

<a href="{{ route('vehicles.index') }}" class="btn btn-secondary">
Cancelar
</a>

</div>

</form>

</div>
</div>

@endsection