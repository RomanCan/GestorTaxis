document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
});
var route = document.querySelector("[name=route]").value;
var urlU = route + '/apiUsuario';
new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },
    el: '#user',
    data: {
        // id_rol:''
        usuario: '',
        contrasenia: '',
        nombre: '',
        apellido_p: '',
        apellido_m: ''
            // telefono:''
    },
    methods: {
        // showModal: function() {
        //     $('#add_u').modal('show');
        // },
        agregarU: function() {
            var u = {
                // id_rol:this.id_rol,
                usuario: this.usuario,
                contrasenia: this.contrasenia,
                nombre: this.nombre,
                apellido_p: this.apellido_p,
                apellido_m: this.apellido_m
                    // telefono: this.telefono
            };
            this.$http.post(urlU, u)
                .then(function(json) {
                    // console.log(json);
                    Toast.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Guardado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }).catch(function(json) {
                    console.log(json);
                });

            // this.id_rol='';
            this.usuario = '';
            this.contrasenia = '';
            this.nombre = '';
            this.apellido_p = '';
            this.apellido_m = '';
            // this.telefono = '';
        },
        salir: function() {
            // $('#add_u').modal('hide');
            // this.id_rol='';
            this.usuario = '';
            this.contrasenia = '';
            this.nombre = '';
            this.apellido_p = '';
            this.apellido_m = '';
            // this.telefono = '';
        }
    }
})
