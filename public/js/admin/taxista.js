var route= document.querySelector("[name=route]").value;
var urlE=route+'/apiTaxista';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}
   	},
	el:'#empleado',
	data:{
		buscar:'',
		// nom:'rrrrr',
		empleados:[],
		id_taxista:'',
		nombre:'',
		apellido_p:'',
		apellido_m:'',
		edad:'',
		curp:'',
		licencia:'',
		eid:''
	},
	created:function(){
		this.getEmpleados();
	},
	methods:{
		getEmpleados:function(){
			this.$http.get(urlE)
			.then(function(json){
				this.empleados=json.data;
			});
		},
		agregarE:function(){
			var e={
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				edad:this.edad,
				curp:this.curp,
				licencia:this.licencia
			};
			this.$http.post(urlE,e)
			.then(function(json){
                this.getEmpleados();
				swal({
                    type: "success",
                    title: "Guardado Exitosamente",
                    timer: 1200,
                    showConfirmButton: false
                });
			}).catch(function(json){
                console.log(json);
            });
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.edad='';
				this.curp='';
				this.licencia='';
		},
		editarE:function(id){
			this.editar=true;
			this.$http.get(urlE+'/'+id)
			.then(function(json){
				this.nombre=json.data.nombre
				this.apellido_p=json.data.apellido_p
				this.apellido_m=json.data.apellido_m
				this.edad=json.data.edad
				this.curp=json.data.curp
				this.licencia=json.data.licencia
				this.eid=json.data.id_taxista
			});
		},
		actualizarE:function(){
			var ee={
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				edad:this.edad,
				curp:this.curp,
				licencia:this.licencia
			};
			this.$http.patch(urlE+'/'+this.eid,ee)
			.then(function(json){
                this.getEmpleados();
                swal({
                    type: "success",
                    title: "Guardado Exitosamente",
                    timer: 1200,
                    showConfirmButton: false
                });
			});

			this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.edad='';
				this.curp='';
				this.licencia='';
		},
		eliminarE:function(id){
			var e = confirm('¿Estas seguro de eliminarlo?');
			if (e == true){
				this.$http.delete(urlE +'/'+id)
			  	.then(response=>{
				  		swal({
		                    type: "success",
		                    title: "Eliminado Exitosamente",
		                    timer: 1200,
		                    showConfirmButton: false
		                });
					  	this.getEmpleados();
				    });
			}
			// Swal({
			//   title: "No podras revertir este cambio!,¿Estas seguro?",
			//   icon: 'warning',
			//   showCancelButton: true,
			//   showConfirmButton: true,
			//   confirmButtonColor: '#3085d6',
			//   cancelButtonColor: '#d33',
			//   confirmButtonText: 'Si,borralo',
			//   cancelButtonText:'No,cancelar',
			// }).then((result) => {
			//   if (result.value) {
			//   	this.$http.delete(urlE +'/'+id)
			//   	.then(response=>{
			// 	  		Swal(
				  		
			// 	      	'Ha sido eliminado exitosamente',
			// 	      	'',
			// 	      	'success'
			// 	    );
			// 	  	this.getTaxis();
			//   	}).catch(function(json){
			//   		console.log(json);
			//   	});
			
			//   }
			// })
		},
		salir:function(){
			this.editar=false;
			this.nombre = '';
			this.costo='';
			this.cantidad='';
			this.id_tipo = '';
		}

	},
	computed:{
		filtro:function(){
			return this.empleados.filter((empleado)=>{
				return empleado.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
				// || articulo.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}
})
