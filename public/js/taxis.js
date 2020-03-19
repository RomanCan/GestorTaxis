var route= document.querySelector("[name=route]").value;
var urlT=route+'/apiTaxi';
var urlTa=route+'/apiTaxista';
var urlD=route+'/apiDescripcion';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#taxi',

	data:{
		buscar:'',
		taxis:[],
		taxistas:[],
		descripciones:[],
		id_descripcion:'',
		id_taxi:'',
		id_taxista:'',
		no_taxi:'',
		nombre:'',
		marca:'',
		placa:'',
		numero_pasajero:'',
		activo:'',
		editar:false,
		tid:''
	},
	created:function(){
		this.getTaxis();
		this.getTaxistas();
		this.getDescripciones();
	},
	methods:{
		getTaxis:function(){
			this.$http.get(urlT)
			.then(function(json){
				this.taxis=json.data;
			}).catch(function(json){
				console.log(json);
			});
		},
		getTaxistas:function(){
			this.$http.get(urlTa)
			.then(function(json){
				//console.log(json);
				this.taxistas = json.data;
			});
		},
		getDescripciones:function(){
			this.$http.get(urlD)
			.then(function(json){
				this.descripciones=json.data;
			});
		},
		agregarT:function(){
			var t={
				// id_taxi:this.id_taxi,
				id_taxista:this.id_taxista,
				id_descripcion:this.id_descripcion,
				no_taxi:this.no_taxi,
				// marca:this.marca,
				placa:this.placa,
				numero_pasajero:this.numero_pasajero,
				activo:this.activo
			};
			this.$http.post(urlT,t)
			.then(function(response){
				this.getTaxis();
				Swal({
				  position: 'center',
				  icon: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				
			});
				

		},
		editarT:function(id){
			this.editar=true;
			this.$http.get(urlT+'/'+id)
			.then(function(response){
				// this.id_taxi=json.data.id_taxi
				this.id_taxista=response.data.id_taxista
				this.id_descripcion=response.data.id_descripcion
				this.no_taxi=response.data.no_taxi
				// this.marca=response.data.marca
				this.placa=response.data.placa
				this.numero_pasajero=response.data.numero_pasajero
				this.activo=response.data.activo
				this.tid=response.data.id_taxi
			});

		},
		actualizarT:function(){
			var t={
				// id_taxi:this.id_taxi,
				id_taxista:this.id_taxista,
				id_descripcion:this.id_descripcion,
				no_taxi:this.no_taxi,
				// marca:this.marca,
				placa:this.placa,
				numero_pasajero:this.numero_pasajero,
				activo:this.activo,
			};
			this.$http.patch(urlT+'/'+this.tid,t)
			.then(function(json){
				Swal({
				  position: 'center',
				  icon: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				});
				window.reload();
				this.getTaxis();
			}).catch(function(json){
				console.log(json);
			});
			this.editar=false;
				this.id_taxi='';
				this.id_taxista='';
				this.id_descripcion='';
				this.no_taxi='';
				// this.marca='';
				this.placa='';
				this.numero_pasajero='';
				this.activo='';
		},
		eliminarT:function(id){

			var t = confirm('¿Estas seguro de eliminarlo?');
			if (t == true){
				this.$http.delete(urlT +'/'+id)
			  	.then(response=>{
					swal({
		                    type: "success",
		                    title: "Eliminado Exitosamente",
		                    timer: 1200,
		                    showConfirmButton: false
		                });
					  	this.getTaxis();
				})
			}
			// Swal.fire({
			//   title: "No podras revertir este cambio!,¿Estas seguro?",
			//   type: 'warning',
			//   showCancelButton: true,
			//   confirmButtonColor: '#3085d6',
			//   cancelButtonColor: '#d33',
			//   confirmButtonText: 'Si,borralo',
			//   cancelButtonText:'No,cancelar',
			// }).then((result) => {
			//   if (result.value) {
			//   	this.$http.delete(urlT +'/'+id)
			//   	.then(response=>{
			// 	  		Swal.fire(
				  		
			// 	      	'Ha sido eliminado exitosamente',
			// 	      	'',
			// 	      	'success'
			// 	    )
			// 	  	this.getTaxis();
			//   	}).catch(function(json){
			//   		console.log(json);
			//   	});
			
			//   }
			// })
				
				
		},
		salir:function(){
			this.editar=false;
			this.id_taxi='';
			this.id_descripcion='';
				this.id_taxista='';
				this.no_taxi='';
				// this.marca='';
				this.placa='';
				this.numero_pasajero='';
				this.activo='';
				$('#add_t').modal('hide');
		}
	},
	computed:{
		filtro:function(){
			return this.taxis.filter((taxi)=>{
				return taxi.placa.toLowerCase().match(this.buscar.trim().toLowerCase())
				|| taxi.taxistas.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
				
			});
		}
	}
})