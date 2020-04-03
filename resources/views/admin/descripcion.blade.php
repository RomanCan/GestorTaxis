@extends('master.master')
@section('contenido')

<div id="descripcion">
	<div class="container">
		<button class="btn waves-effect waves-light modal-trigger" data-target="modaln"><i class="material-icons">add_circle</i></button>
				<div>
            		<input type="text" placeholder="Escriba el nombre de la marca" v-model="buscar" class="form-control">
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
							<span class="btn waves-effect waves-light modal-trigger" data-target="modalu" @click="editarD(d.id_descripcion)"><i class="material-icons">create</i></span>
              				<span class="btn waves-effect waves-light" @click="eliminarD(d.id_descripcion)"><i class="material-icons">delete</i></span>	
							
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

               <input type="text" placeholder="Marca" v-model="marca" class="form-control">

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
              <div class="modal-body" >

               <input type="text" placeholder="Marca" v-model="marca" class="form-control">

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
	<script src="js/admin/descripcion.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">