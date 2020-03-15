@extends('master.master')
@section('contenido')
	
<div id="pasaje">
	<div class="container">
		<button class="btn btn-primary" @click="showModal()">Agregar+</button>
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
							<span class="btn btn-success glyphicon glyphicon-pencil" @click="editarP(p.id_pasaje)"></span>
							<span class="btn btn-danger glyphicon glyphicon-trash" @click="eliminarP(p.id_pasaje)"></span>
						</td>
					</tr>
				</tbody>
			</table>
        </div>
		
		<!-- fin de la tabla -->
		<!-- inicio del modal -->

		<div class="modal fade" tabindex="-1" role="dialog" id="add_p">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir()">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar</h4>
              </div>
              <div class="modal-body">
              	<!-- <input type="text" placeholder="N" v-model="id_destino" class="form-control"> -->
                <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <select class="form-control" v-model="id_destino">
                	<option disabled="Selecciona el lugar"></option>
                	<option v-for="d in destinos" v-bind:value="d.id_destino">@{{d.nombre}}</option>
                </select>
                <input type="date" placeholder="Fecha" v-model="fecha" class="form-control">
                <input type="time" placeholder="Hora" v-model="hora" class="form-control">


              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" v-on:click="actualizarP()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarP()" v-if="!editar">Guardar</button>
                <!-- <button type="submit" class="btn btn-success" @click="salir">Cancelar</button> -->

              </div>
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