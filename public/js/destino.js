var route= document.querySelector("[name=route]").value;
var urlD=route+'/apiDestino';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#destino',
	data:{
		buscar:'',
		destinos:[],
		id_destino:'',
		nombre:'',
		precio:'',
		did:'',
		editar:false
	},
	created:function(){
		this.getDestinos();
	},
	methods:{
		getDestinos:function(){
			this.$http.get(urlD)
			.then(function(json){
				this.destinos=json.data;
			});
		},
		showModal:function(){
			$('#add_d').modal('show');
		},
		agregarD:function(){
			var d={

				nombre:this.nombre,
				precio:this.precio
			};
			
			this.$http.post(urlD,d)
			.then(function(response){
				$('#add_d').modal('hide');
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				this.getDestinos();
				
			console.log(response);
				
			}).catch(function(response){
				console.log(response);
			});	
		},
		editarD:function(id){
			this.editar=true;
			this.$http.get(urlD+'/'+id)
			.then(function(response){
				this.nombre=response.data.nombre
				this.precio=response.data.precio
				this.did=response.data.id_destino
				$('#add_d').modal('show');
				
			});

		},
		actualizarD:function(){
			var dest={
				nombre:this.nombre,
				precio:this.precio
			};
			this.$http.patch(urlD+'/'+this.did,dest)
			.then(function(json){
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				this.getDestinos();
				
			});
			this.editar=false;
			$('#add_d').modal('hide');
			this.nombre='';
			this.precio='';
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
			  	this.$http.delete(urlD +'/'+id)
			  	.then(response=>{
				  		Swal.fire(
				  		
				      	'Ha sido eliminado exitosamente',
				      	'',
				      	'success'
				    )
				  	this.getDestinos();
			  	}).catch(function(json){
			  		console.log(json);
			  	})
			    
			 //    .then(function(json){
				// 	this.getArticulos();
				// });
			
			  }
			})
				
				
		},
		salir:function(){
			this.editar=false;
			this.nombre = '';
			this.costo='';
			this.cantidad='';
				$('#add_empleados').modal('hide');
		}

	},
	computed:{
		filtro:function(){
			return this.destinos.filter((destino)=>{
				return destino.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
				
			});
		}
	}
})