@extends('master.master')
@section('contenido')
	
<div id="taxi">
	<div class="container">
		<button class="btn waves-effect waves-light modal-trigger" data-target="modaln"><i class="material-icons">add_circle</i></button>
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
              <span class="btn waves-effect waves-light modal-trigger" data-target="modalu" @click="editarT(d.id_taxi)"><i class="material-icons">create</i></span>
              <span class="btn waves-effect waves-light" @click="eliminarT(d.id_taxi)"><i class="material-icons">delete</i></span>	
						</td>		
					</tr>		
				</tbody>
			</table><!-- fin del la tabla -->
       	</div>
		
    <!-- inicio del modal -->
    <div class="modal" id="modalu">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Informacion</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col s6 input-field">
                    <div>
                      <label>Seleccione un taxista:</label>
                      <select class="browser-default" v-model="id_taxista">
                        <option disabled="Elija un taxista"></option>
                        <option v-for="t in taxistas" v-bind:value="t.id_taxista">@{{t.nombre}}</option>
                      </select>
                    </div>
                    <div>
                      <label>No. Taxi:</label><input class="" type="text" placeholder="Numero de Taxi" v-model="no_taxi">
                    </div>
                    <div>
                      <label>Seleccione la marca:</label>
                      <select class="browser-default" v-model="id_descripcion">
                        <option disabled="Elija una marca"></option>
                        <option v-for="i in descripciones" v-bind:value="i.id_descripcion">@{{i.marca}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col s6">
                    <label>Placas</label><input class="" type="text" placeholder="Placas" v-model="placa">
                    <label>Capacidad de pasajeros:</label><input class="" type="text" placeholder="Capacidad de Pasajeros" v-model="numero_pasajero">
                    <label>se encuentra activo?</label><input class="" type="number" placeholder="0 o 1" v-model="activo">
                  </div>
                </div>
              </div>


              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="actualizarT()">Actualizar</button>

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

                <div class="row">
                  <div class="col s6 input-field">
                    <div>
                      <label>Seleccione un taxista:</label>
                      <select class="browser-default" v-model="id_taxista">
                        <option disabled="Elija un taxista" class="active"></option>
                        <option v-for="t in taxistas" v-bind:value="t.id_taxista">@{{t.nombre}}</option>
                      </select>
                    </div>
                    <div>
                      <label>No. Taxi:</label><input class="" type="text" placeholder="Numero de Taxi" v-model="no_taxi">
                    </div>
                    <div>
                      <label>Seleccione la marca:</label>
                      <select class="browser-default" v-model="id_descripcion">
                        <option disabled="Elija una marca"></option>
                        <option v-for="i in descripciones" v-bind:value="i.id_descripcion">@{{i.marca}}</option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="col s6">
                    <label>Placas</label><input class="" type="text" placeholder="Placas" v-model="placa">
                    <label>Capacidad de pasajeros:</label><input class="" type="text" placeholder="Capacidad de Pasajeros" v-model="numero_pasajero">
                    <label>se encuentra activo?</label><input class="" type="number" placeholder="0 o 1" v-model="activo">
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button class="btn waves-effect waves-light modal-action modal-close" @click="agregarT()">Guardar</button>
              </div>
            </div>
        </div>
        <!-- fin del modal -->
	</div>
</div>


@endsection
@push('scripts')
	<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
    });
  </script>
  
	<script src="js/admin/taxis.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">