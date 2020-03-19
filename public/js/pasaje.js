var route= document.querySelector("[name=route]").value;
var urlP=route+'/apiPasaje';
var urlD=route+'/apiDestino';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#pasaje',
	data:{
		buscar:'',
		pasajes:[],
		destinos:[],
		id_pasaje:'',
		id_destino:'',
		nombre:'',
		destino:'',
		fecha:'',
		hora:'',
		editar:false,
		pid:''
	},
	created:function(){
		this.getPasaje();
		this.getDestino();
	},
	methods:{
		getPasaje:function(){
			this.$http.get(urlP)
			.then(function(json){
				this.pasajes=json.data;
			});
		},
		getDestino:function(){
			this.$http.get(urlD)
			.then(function(json){
				this.destinos=json.data;
			});
		},
		showModal:function(){
			$('#add_p').modal('show');
		},
		agregarP:function(){
			var p={
				nombre:this.nombre,
				id_destino:this.id_destino,
				fecha:this.fecha,
				hora:this.hora
			};
			this.$http.post(urlP,p)
			.then(function(json){
				$('#add_p').modal('hide');
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				this.getPasaje();
				
			});
		},
		editarP:function(id){
			this.editar=true;
			this.$http.get(urlP+'/'+id)
			.then(function(json){
				this.nombre=json.data.nombre
				this.id_destino=json.data.id_destino
				this.fecha=json.data.fecha
				this.hora=json.data.hora
				this.pid=json.data.id_pasaje
				$('#add_p').modal('show');
			});
		},
		actualizarP:function(){
			var a={
				nombre:this.nombre,
				id_destino:this.id_destino,
				fecha:this.fecha,
				hora:this.hora
			};
			this.$http.patch(urlP+'/'+this.pid,a)
			.then(function(json){
				this.getPasaje();
			});
			$('#add_p').modal('hide');
			swal({
				  position: 'center',
				  icon: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
			this.editar=false;
			this.nombre='';
			this.id_destino='';
			this.fecha='';
			this.hora='';
			
		},
		eliminarP:function(id){
			var p = confirm('¿Esta seguro de eliminarlo');
			if (p == true){
				this.$http.delete(urlP+'/'+id)
				.then(json=>{
						swal({
		                    type: "success",
		                    title: "Eliminado Exitosamente",
		                    timer: 1200,
		                    showConfirmButton: false
		                });
					this.getPasaje();
				})
			}
			// swal({
			//   title: "No podras revertir este cambio!,¿Estas seguro?",
			//   icon: 'warning',
			//   showCancelButton: true,
			//   confirmButtonColor: '#3085d6',
			//   cancelButtonColor: '#d33',
			//   confirmButtonText: 'Si,borralo',
			//   cancelButtonText:'No,cancelar',
			// }).then((result) => {
			//   if (result.value) {
			//   	this.$http.delete(urlP +'/'+id)
			//   	.then(response=>{
			// 	  		swal(
				  		
			// 	      	'Ha sido eliminado exitosamente',
			// 	      	'',
			// 	      	'success'
			// 	    )
			// 	  	this.getPasaje();
			//   	}).catch(function(json){
			//   		console.log(json);
			//   	})
			    
			 //    .then(function(json){
				// 	this.getArticulos();
				// });
			
			  // }
			// })
				
				
		},
		salir:function(){
			this.editar=false;
			this.nombre = '';
			// this.costo='';
			this.id_destino='';
			this.fecha='';
			this.hora='';
				
		}
	},
	computed:{
		filtro:function(){
			return this.pasajes.filter((pasaje)=>{
				return pasaje.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
				
			});
		}
	}
})