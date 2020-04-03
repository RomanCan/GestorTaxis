@extends('master.master')
@section('contenido')
	
<div id="destino">
	<div class="container">
			<button class="btn waves-effect waves-light modal-trigger" data-target="modaln"><i class="material-icons">add_circle</i></button>
				<div>
            		<input type="text" placeholder="Escriba el nombre del destino" v-model="buscar" class="form-control">
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
								<span class="btn waves-effect waves-light modal-trigger" data-target="modalu" @click="editarD(d.id_destino)"><i class="material-icons">create</i></span>
								<span class="btn waves-effect waves-light" @click="eliminarD(d.id_destino)"><i class="material-icons">delete</i></span>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			<!-- fin del la tabla -->
			



			<!-- inicio del modal -->
    	<div class="modal" id="modalu">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Informacion</h4>
              </div>
              <div class="modal-body">
              	<input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="Costo" v-model="precio" class="form-control">
              </div>


              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="actualizarD()">Actualizar</button>

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
                <input type="text" placeholder="Costo" v-model="precio" class="form-control">
              </div>


              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="agregarD()">Guardar</button>
              </div>
            </div>
        </div>
        <!-- fin del modal -->
    </div>
</div>
	
	


@endsection
@push('scripts')
	<script src="js/admin/destino.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">