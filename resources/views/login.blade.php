@extends('master.masterlogin')
@section('contenido')
<div id="user">
		<div>
			<div class="container-login center-align">
			    <div style="margin:15px 0;">
			        <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
			        <p>Inicia sesión con tu cuenta</p>   
			    </div>
			    <form action="{{url('log')}}" method="POST">
			   	@csrf
			    <div class="input-field">
			        <input  type="text" class="validate" name="usuario">
			        <label ><i class="zmdi zmdi-account"></i>&nbsp; Nombre</label>
			    </div>
			    <div class="input-field col s12">
			        <input  type="password" class="validate" name="contrasenia">
			        <label ><i class="zmdi zmdi-lock"></i>&nbsp; Contraseña</label>
			    </div>
			         <button class="waves-effect waves-teal btn-flat" type="submit" value="Login">Ingresar &nbsp; <i class="zmdi zmdi-mail-send"></i></button>
			    </form>
			        
			</div>
		</div>

		<div align="right">
			<label><small>¿No tienes una cuenta?<br>Entonces regístrate ahora!</small></label><br>
			<!-- <button class="btn btn-warning" @click="showModal()">Regístrate</button> -->
			<button class="btn modal-trigger red" data-target="modalr">Regístrate</button>
		</div>

		<div id="modalr" class="modal">
			<div class="modal-content">
				<h3>Regístrate</h3>
			<p>
				<input type="text" maxlength="10" placeholder="Nombre de usuario" v-model="usuario" class="form-control">
		        <input type="text" maxlength="10" placeholder="Contraseña" v-model="contrasenia" class="form-control">
		        <input type="text" maxlength="10" placeholder="Nombre" v-model="nombre" class="form-control">
		        <input type="text" maxlength="10" placeholder="Apellido Paterno" v-model="apellido_p" class="form-control">
				<input type="text" maxlength="10" placeholder="Apellido Materno" v-model="apellido_m" class="form-control">
				
		    	{{-- <input type="number" maxlength="10" placeholder="No. Telefonico" v-model="telefono" class="form-control"> --}}
			</p>
			</div>
			<div class="modal-footer">
				<button class="waves-effect waves-light btn red" @click="agregarU()">Guardar</button>
			</div>
		</div>
	
</div>


	
@endsection

@push('scripts')
	{{-- <script src="js/modal-materialize.js"></script> --}}
	<script src="js/registro.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">

						