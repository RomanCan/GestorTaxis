 var route= document.querySelector("[name=route]").value;
var urlU=route+'/apiUsuario';

new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}
   	},
	el:'#perfil',
	data:{
		trabajadores:[],
		iu:'',
		usuario:'',
		contrasenia:'',
		nombre:'',
		apellido_p:'',
		apellido_m:'',
		telefono:''


	},
	created:function(){
		this.getUsuario();
	},
	methods:{
		getUsuario:function(){
			this.$http.get(urlU)
			.then(function(json){
				this.trabajadores=json.data;
			}).catch(function(json){
				console.log(json);
			});
		},
		editarU:function(id){

			this.$http.get(urlU+'/'+id)
			.then(function(json){
				this.usuario=json.data.usuario
				this.contrasenia=json.data.contrasenia
				this.nombre=json.data.nombre
				this.apellido_p=json.data.apellido_p
				this.apellido_m=json.data.apellido_m
				this.telefono=json.data.telefono
				this.iu=json.data.id_usuario
			}).catch(function(json){
				console.log(json);
			});
		},
		actualizarU:function(){
			var u={
				usuario:this.usuario,
				contrasenia:this.contrasenia,
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				telefono:this.telefono
			};
			this.$http.patch(urlU+'/'+this.iu,u)
			.then(function(json){

                this.getUsuario();
                swal({
                    type: "success",
                    title: "Guardado Exitosamente",
                    timer: 1200,
                    showConfirmButton: false
                });

			});

				// Swal.fire({
				//   position: 'center',
				//   type: 'success',
				//   title: 'Guardado exitosamente',
				//   html:
    			// 'Devera cerrar e iniciar sesion para ver los cambios',
				//   showConfirmButton: false,
				//   timer: 2500
				// })
				this.usuario="";
				this.contrasenia="";
				this.nombre="";
				this.apellido_p="";
				this.apellido_m="";
				this.telefono="";
				this.iu="";
		}
	}
})
