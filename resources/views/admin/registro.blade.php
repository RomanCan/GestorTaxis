@extends('master.master')
@section('contenido')
<div id="registro">
	<input type="text" v-model="hora">
	<div class="responsive">
		<table class="table table-bordered table-responsive">
			<thead>
				<th>Destino</th>
				<th>Precio</th>
				<th>Nombre</th>
				<th>Fecha</th>
				<th>Hora</th>
			</thead>
			<tbody>
				<tr v-for="(r,index) in registros">
					<td>@{{r.destinos.id_destino}}</td>
					<td>@{{r.destinos.precio}}</td>
					<td>@{{r.pasajes.nombre}}</td>
					<td>@{{r.pasajes.fecha}}</td>
					<td>@{{r.pasajes.hora}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection
@push('scripts')
	<script src="js/admin/detalleregistro.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">