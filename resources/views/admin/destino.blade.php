@extends('master.master')
@section('contenido')
	
<div id="destino">
	<div class="container">
			<button class="btn btn-primary" @click="showModal()">Agregar+</button>
				<div>
            		<input type="text" placeholder="Escriba el nombre del empleado o las placas" v-model="buscar" class="form-control">
            	</div>
            <div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<th>No. De Destino</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						<tr v-for="(d,index) in filtro">
							<td>@{{d.id_destino}}</td>
							<td>@{{d.nombre}}</td>
							<td>@{{d.precio}}</td>
							<td>
								<span class="btn btn-success glyphicon glyphicon-pencil" @click="editarD(d.id_destino)"></span>
								<span class="btn btn-danger glyphicon glyphicon-trash" @click="eliminarD(d.id_destino)"></span>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			<!-- fin del la tabla -->
			<!-- inicio del modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="add_d">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir()">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar Articulos</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Articulo</h4>
              </div>
              <div class="modal-body">
              	<!-- <input type="text" placeholder="N" v-model="id_destino" class="form-control"> -->
                <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="Costo" v-model="precio" class="form-control">

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" v-on:click="actualizarD()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarD()" v-if="!editar">Guardar</button>
                <!-- <button type="submit" class="btn btn-success" @click="salir">Cancelar</button> -->
              </div>

            </div>
          </div>
    	</div>
    </div>
</div>
	
	


@endsection
@push('scripts')
	<script src="js/destino.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">