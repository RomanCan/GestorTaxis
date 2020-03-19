@extends('master.master')
@section('contenido')
	
<div id="pasaje">
	<div class="container">
		<button class="btn waves-effect waves-light modal-trigger" data-target="modaln"><i class="material-icons">add_circle</i></button>
				<div>
            		<input type="text" placeholder="Escriba el nombre del empleado o las placas" v-model="buscar" class="form-control">
            	</div>
        <div class="table-responsive">
        	<table class="table table-bordered table-striped">
				<thead>
					<th>Lugar</th>
					<th>Cliente</th>
					<th>Destino</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					<tr v-for="(p,index) in filtro">
						<td>@{{index+1}}</td>
						<td>@{{p.nombre}}</td>		
						<td>@{{p.destinos.nombre}}</td>		
						<td>@{{p.fecha}}</td>		
						<td>@{{p.hora}}</td>					
						<td>
							<span class="btn waves-effect waves-light modal-trigger" data-target="modalu" @click="editarP(p.id_pasaje)"><i class="material-icons">create</i></span>
							<span class="btn waves-effect waves-light" @click="eliminarP(p.id_pasaje)"><i class="material-icons">delete</i></span>
							<!-- <span class="btn btn-success glyphicon glyphicon-pencil" @click="editarP(p.id_pasaje)"></span>
							<span class="btn btn-danger glyphicon glyphicon-trash" @click="eliminarP(p.id_pasaje)"></span> -->
						</td>
					</tr>
				</tbody>
			</table>
        </div>
		
		<!-- fin de la tabla -->
		<!-- inicio del modal -->
    	<div class="modal" id="modalu">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Informacion</h4>
              </div>
              <div class="modal-body">

               <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <select class="form-control" v-model="id_destino">
                	<option disabled="Selecciona el lugar"></option>
                	<option v-for="d in destinos" v-bind:value="d.id_destino">@{{d.nombre}}</option>
                </select>
                <input type="date" placeholder="Fecha" v-model="fecha" class="form-control">
                <input type="time" placeholder="Hora" v-model="hora" class="form-control">

              </div>

              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="actualizarP()">Actualizar</button>

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
              <div class="modal-body" >

               <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <select class="form-control" v-model="id_destino">
                	<option disabled="Selecciona el lugar"></option>
                	<option v-for="d in destinos" v-bind:value="d.id_destino">@{{d.nombre}}</option>
                </select>
                <input type="date" placeholder="Fecha" v-model="fecha" class="form-control">
                <input type="time" placeholder="Hora" v-model="hora" class="form-control">

              </div>


              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="agregarP()">Guardar</button>
              </div>
            </div>
        </div>
        <!-- fin del modal -->


	</div>
	<!-- fin del container -->
</div>
	<!-- fin del id -->
	


@endsection
@push('scripts')
	<script src="js/pasaje.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">