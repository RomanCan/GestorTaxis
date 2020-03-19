@extends('master.master')
@section('contenido')
<div id="empleado">
	<div class="container">
		<button class="btn waves-effect waves-light modal-trigger" data-target="modaln"><i class="material-icons">add_circle</i></button>
			<div>
            	<input type="text" placeholder="Escriba el nombre del empleado" v-model="buscar" class="form-control">
            </div>
        	<table class="table table-bordered table-striped">
				<thead>
					<th>Numero de empleado</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Edad</th>
					<th>Curp</th>
					<th>Licencia</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					<tr v-for="(e,index) in filtro">
						<td>@{{index+1}}</td>
						<td>@{{e.nombre}}</td>
						<td>@{{e.apellido_p}}</td>
						<td>@{{e.apellido_m}}</td>
						<td>@{{e.edad}}</td>
						<td>@{{e.curp}}</td>
						<td>@{{e.licencia}}</td>

						<td >
							<span class="btn waves-effect waves-light modal-trigger" data-target="modalu" @click="editarE(e.id_taxista)"><i class="material-icons">create</i></span>
							<span class="btn waves-effect waves-light" @click="eliminarE(e.id_taxista)"><i class="material-icons">delete</i></span>
						</td>
					</tr>
				</tbody>
			</table>

		<!-- fin de la tabla -->
		<!-- inicio del modal -->
		<div class="modal" id="modalu">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Informacion</h4>
              </div>
              <div class="modal-body">
              	<input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="Apellido Paterno" v-model="apellido_p" class="form-control">
                <input type="text" placeholder="Apellido Materno" v-model="apellido_m" class="form-control">
                <input type="number" placeholder="Edad" v-model="edad" class="form-control">
                <input type="text" placeholder="curp" v-model="curp" class="form-control">
                <input type="text" placeholder="0 o 1" v-model="licencia" class="form-control">
              </div>


              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="actualizarE()">Actualizar</button>

              </div>
            </div>
        </div>
        <!-- fin del modal -->




        <!-- inicio del modal -->
		<div class="modal" id="modaln">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Agregar Nuevo</h4>
              </div>
              <div class="modal-body">
              	<input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="Apellido Paterno" v-model="apellido_p" class="form-control">
                <input type="text" placeholder="Apellido Materno" v-model="apellido_m" class="form-control">
                <input type="number" placeholder="Edad" v-model="edad" class="form-control">
                <input type="text" placeholder="curp" v-model="curp" class="form-control">
                <input type="text" placeholder="0 o 1" v-model="licencia" class="form-control">
              </div>


              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="agregarE()">Guardar</button>
              </div>
            </div>
        </div>
        <!-- fin del modal -->
	</div>
</div>




@endsection
@push('scripts')
	<script src="js/taxista.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">
