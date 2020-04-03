var route = document.querySelector("[name=route]").value;
var urlV = route + '/apiDescripcion';
new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },
    el: '#descripcion',
    data: {
        buscar: '',
        descripciones: [],
        id_descripcion: '',
        marca: '',
        editar: false,
        did: ''
    },
    created: function() {
        this.getDescripcion();
    },
    methods: {
        getDescripcion: function() {
            this.$http.get(urlV)
                .then(function(json) {
                    this.descripciones = json.data;
                }).catch(function(json) {
                    console.log(json);
                });
        },

        agregarD: function() {
            var d = {
                marca: this.marca
                    // placas:this.placas,
                    // activo:this.activo,
                    // numero_pasajero:this.numero_pasajero
            };
            this.$http.post(urlV, d)
                .then(function(json) {
                    swal({
                        type: "success",
                        title: "Guardado Exitosamente",
                        timer: 1200,
                        showConfirmButton: false
                    });
                    this.getDescripcion();
                });
            this.marca = "";
            // this.placas="";
            // this.activo="";
            // this.numero_pasajero="";
        },
        editarD: function(id) {
            this.editar = true;
            this.$http.get(urlV + '/' + id)
                .then(function(json) {
                    this.marca = json.data.marca
                        // this.placas=json.data.placas
                        // this.activo=json.data.activo
                        // this.numero_pasajero=json.data.numero_pasajero

                    this.did = json.data.id_descripcion

                });
        },
        actualizarD: function() {
            var d = {
                marca: this.marca
                    // placas:this.placas,
                    // activo:this.activo,
                    // numero_pasajero:this.numero_pasajero
            };
            this.$http.patch(urlV + '/' + this.did, d)
                .then(function(json) {
                    swal({
                        type: "success",
                        title: "Guardado Exitosamente",
                        timer: 1200,
                        showConfirmButton: false
                    });
                    this.getDescripcion();
                }).catch(function(json) {
                    console.log(json);
                });
            this.editar = false;
            this.marca = "";
            // this.placas="";
            // this.activo="";
            // this.numero_pasajero="";
        },
        eliminarD: function(id) {
            var a = confirm('¿Estas seguro de eliminarlo?');

            if (a == true) {
                this.$http.delete(urlV + '/' + id)
                    .then(response => {
                        // swal({
                        //               type: "success",
                        //               title: "Eliminado Exitosamente",
                        //               timer: 1200,
                        //               showConfirmButton: false
                        //           });
                        this.getDescripcion();
                    }).catch(response=>{
                        alert('El vehiculo aun esta en uso');
                    });
            } else {
                
            }
            // Swal({
            //   title: "No podras revertir este cambio!,¿Estas seguro?",
            //   icon: 'warning',
            //   showCancelButton: true,
            //   confirmButtonColor: '#3085d6',
            //   cancelButtonColor: '#d33',
            //   confirmButtonText: 'Si,borralo',
            //   cancelButtonText:'No,cancelar',
            // }).then((result) => {
            // 	 if (result.value) {
            // 	  	this.$http.delete(urlV +'/'+id)
            // 	  	.then(response=>{
            // 		  	this.getDescripcion();
            // 	  	}).catch(function(json){
            // 	  		console.log(json);
            // 	  	})
            // 	}
            // })
        },
        salir: function() {
            this.editar = false;
            this.marca = "";
            // this.placas="";
            // this.activo="";
            // this.numero_pasajero="";

        },

    },
    computed: {
        filtro: function() {
            return this.descripciones.filter((descripcion) => {
                return descripcion.marca.toLowerCase().match(this.buscar.trim().toLowerCase());

            });
        }
    }
})