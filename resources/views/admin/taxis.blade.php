@extends('master.master')
@section('contenido')
	
<div id="taxi">
	<div class="container">
		<button class="btn btn-primary" @click="showModal()">Agregar+</button>
		<div>
        	<input type="text" placeholder="Escriba el nombre del empleado o las placas" v-model="buscar" class="form-control">
        </div>
       	<div class="table-responsive">
       		<table class="table table-bordered table-striped">
				<thead>
					<th>ID</th>	
					<th>Taxista</th>
					<th>Marca</th>
					<th>Numero de taxi</th>
					<th>Placas</th>
					<th>Numero de pasajeros</th>
					<th>Activo</th>
					<th>Opciones</th>
				</thead>
				<tbody >
					<tr v-for="(d,index) in filtro">
						<td>@{{index+1}}</td>		
						<td>@{{d.taxistas.nombre}}</td>
						<td>@{{d.descripciones.marca}}</td>
						<td>@{{d.no_taxi}}</td>
						<td>@{{d.placa}}</td>
						<td>@{{d.numero_pasajero}}</td>		
						<td>@{{d.activo}}</td>
						<td>
							<span class="btn btn-success glyphicon glyphicon-pencil" @click="editarT(d.id_taxi)"></span>
							<span class="btn btn-danger glyphicon glyphicon-trash" @click="eliminarT(d.id_taxi)"></span>	
						</td>		
					</tr>		
				</tbody>
			</table><!-- fin del la tabla -->
       	</div>
		

			<!-- inicio del modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="add_t">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir()">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar Articulos</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Articulo</h4>
              </div>
              <div class="modal-body">

              	<select class="form-control" v-model="id_taxista">
              		<option disabled="Elija un taxista"></option>
              		<option v-for="t in taxistas" v-bind:value="t.id_taxista">@{{t.nombre}}</option>
              	</select>
              	<select class="form-control" v-model="id_descripcion">
              		<option disabled="Elija una marca"></option>
              		<option v-for="i in descripciones" v-bind:value="i.id_descripcion">@{{i.marca}}</option>
              	</select>
              	<input class="form-control" type="text" placeholder="Numero de Taxi" v-model="no_taxi">
              	<input class="form-control" type="text" placeholder="Placas" v-model="placa">
              	<input class="form-control" type="text" placeholder="Capacidad de Pasajeros" v-model="numero_pasajero">
              	<input class="form-control" type="number" placeholder="0 o 1" v-model="activo">
              	
              </div>


              <div class="modal-footer">
                <button type="submit" class="btn btn-success" v-on:click="actualizarT()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarT()" v-if="!editar">Guardar</button>
                <!-- <button type="submit" class="btn btn-success" @click="salir">Cancelar</button> -->

              </div>
            </div>
          </div>
        </div>
	</div>
</div>


@endsection
@push('scripts')
	
	<script src="js/taxis.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">