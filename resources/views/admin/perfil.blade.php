@extends('master.master')
@section('contenido')
 	<div id="perfil">
 		<div class="container">

        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Nombre de Usuario</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
              </tr>
          </thead>
          <tbody>
            <tr v-for="(p,index) in trabajadores">
              <td>@{{p.usuario}}</td>
              <td>@{{p.contrasenia}}</td>
              <td>@{{p.nombre}}</td>
              <td>@{{p.apellido_p}}</td>
              <td>@{{p.apellido_m}}</td>
              <td>@{{p.telefono}}</td>
              <td>
                <button class="btn waves-effect waves-light modal-trigger" @click="editarU(p.id_usuario)" data-target="modale"><i class="material-icons">create</i></button>

              </td>
            </tr>
          </tbody>
        </table>
 		</div>


 			<!-- inicio del modal -->
		<div class="modal" id="modale">
            <div class="modal-content">
              <div class="modal-header">
                {{--  <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir()">x</span></button>  --}}
                <h4 class="modal-title" >Editar Informacion Personal</h4>
              </div>
              <div class="modal-body">
              	<input type="text" placeholder="Nombre de Usuario" v-model="usuario" class="form-control">
              	<input type="text" placeholder="Contraseña" v-model="contrasenia" class="form-control">
              	<input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="Apellido Paterno" v-model="apellido_p" class="form-control">
                <input type="text" placeholder="Apellido Materno" v-model="apellido_m" class="form-control">
                <input type="number" placeholder="Telefono" v-model="telefono" class="form-control">

              </div>
              <div class="modal-footer">
                <button class="btn btn-success modal-action modal-close" @click="actualizarU()">Actualizar</button>

              </div>
            </div>
          </div>
        </div>
        <!-- fin del modal -->
 		</div>
 	</div>

@endsection

@push('scripts')
	<script src="js/usuario.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">
