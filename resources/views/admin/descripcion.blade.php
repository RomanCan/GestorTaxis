@extends('master.master')
@section('contenido')

<div id="descripcion">
	<div class="container">
		<button class="btn btn-primary" @click="showModal()">Agregar+</button>
				<div>
            		<input type="text" placeholder="Escriba el nombre del empleado o las placas" v-model="buscar" class="form-control">
            	</div>
        <div class="table-responsive">
	        <table class="table table-bordered table-striped">
				<thead>
					<th>ID</th>
					<th>Marca</th>
					<!-- <th>Placas</th>
					<th>No. de pasajeros</th>
					<th>Activo</th> -->
					<th>Opciones</th>
				</thead>
				<tbody>
					<tr v-for="(d,index) in filtro">
						<td>@{{index+1}}</td>
						<td>@{{d.marca}}</td>
						<!-- <td>@{{d.placa}}</td>
						<td>@{{d.numero_pasajero}}</td>
						<td>@{{d.activo}}</td> -->
						<td>
							<span class="btn btn-success glyphicon glyphicon-pencil" @click="editarD(d.id_descripcion)"></span>
							<span class="btn btn-danger glyphicon glyphicon-trash" @click="eliminarD(d.id_descripcion)"></span>
						</td>
					</tr>
				</tbody>
			</table>
		
        </div>
		<!-- fin de la tabla -->
		<!-- comienzo del modal -->

		<div class="modal fade" tabindex="-1" role="dialog" id="add">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir()">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar</h4>
              </div>
              <div class="modal-body">
              	<input type="text" placeholder="Marca" v-model="marca" class="form-control">
               <!--  <input type="text" placeholder="Placas" v-model="placas" class="form-control">
                <input type="text" placeholder="activo" v-model="activo" class="form-control">
                <input type="text" placeholder="Capacidad de pasajeros" v-model="numero_pasajero" class="form-control"> -->
              </div>


              <div class="modal-footer">
                <button type="submit" class="btn btn-success" v-on:click="actualizarD()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarD()" v-if="!editar">Guardar</button>
                <!-- <button type="submit" class="btn btn-success" @click="salir">Cancelar</button> -->

              </div>
            </div>
          </div>
        </div>
        <!-- fin del modal -->
	</div>
</div>

@endsection
@push('scripts')
	<script src="js/descripcion.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">