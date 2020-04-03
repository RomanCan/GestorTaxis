@extends('master.master_user')
@section('contenido')
 	<div id="perfil">
 		<div class="container">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <th>Nombre de Usuario</th>
            <th>Contraseña</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Telefono</th>
            <th>Opciones</th>
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
                <button class="btn btn-success glyphicon glyphicon-pencil" @click="editarU(p.id_usuario)"></button>
                
              </td>
            </tr>
          </tbody>
        </table>
      </div>
 			<!-- inicio del modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="add">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir()">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar</h4>
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
                <button type="submit" class="btn btn-success" @click="actualizarU()" v-if="editar">Actualizar</button>
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
	<script src="js/usuario/usuario.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">