var route= document.querySelector("[name=route]").value;
var urlV=route + '/apiDescripcion';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#descripcion',
	data:{
		buscar:'',
		descripciones:[],
		id_descripcion:'',
		marca:'',
		editar:false,
		did:''
	},
	created:function(){
		this.getDescripcion();
	},
	methods:{
		getDescripcion:function(){
			this.$http.get(urlV)
			.then(function(json){
				this.descripciones=json.data;
			}).catch(function(json){
				console.log(json);
			});
		},
		showModal:function(){
			$('#add').modal('show');
		},
		agregarD:function(){
			var d={
				marca:this.marca
				// placas:this.placas,
				// activo:this.activo,
				// numero_pasajero:this.numero_pasajero
			};
			this.$http.post(urlV,d)
			.then(function(json){
				$('#add').modal('hide');
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				this.getDescripcion();
				
				
			});
			this.marca="";
			// this.placas="";
			// this.activo="";
			// this.numero_pasajero="";
		},
		editarD:function(id){
			this.editar=true;
			this.$http.get(urlV+'/'+id)
			.then(function(json){
				this.marca=json.data.marca
				// this.placas=json.data.placas
				// this.activo=json.data.activo
				// this.numero_pasajero=json.data.numero_pasajero

				this.did=json.data.id_descripcion
				$('#add').modal('show');
			});
		},
		actualizarD:function(){
			var d={
				marca:this.marca
				// placas:this.placas,
				// activo:this.activo,
				// numero_pasajero:this.numero_pasajero
			};
			this.$http.patch(urlV+'/'+this.did,d)
			.then(function(json){
				this.getDescripcion();
			}).catch(function(json){
				console.log(json);
			});
			this.editar=false;
			$('#add').modal('hide');
			Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				this.marca="";
				// this.placas="";
				// this.activo="";
				// this.numero_pasajero="";
		},
		eliminarD:function(id){
			Swal.fire({
			  title: "No podras revertir este cambio!,¿Estas seguro?",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si,borralo',
			  cancelButtonText:'No,cancelar',
			}).then((result) => {
				 if (result.value) {
				  	this.$http.delete(urlV +'/'+id)
				  	.then(response=>{
					  		Swal.fire(
					  		
					      	'Ha sido eliminado exitosamente',
					      	'',
					      	'success'
					    )
					  	this.getDescripcion();
				  	}).catch(function(json){
				  		console.log(json);
				  	})
				}
			})
		},
		salir:function(){
			this.editar=false;
			this.marca="";
				// this.placas="";
				// this.activo="";
				// this.numero_pasajero="";
			$('#add').modal('hide');

		},

	},
	computed:{
		filtro:function(){
			return this.descripciones.filter((descripcion)=>{
				return descripcion.marca.toLowerCase().match(this.buscar.trim().toLowerCase());
				
			});
		}
	}
})