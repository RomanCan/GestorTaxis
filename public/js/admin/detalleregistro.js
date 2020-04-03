var route= document.querySelector("[name=route]").value;
var urlP=route+'/apiPasaje';
var urlD=route+'/apiDestino';

new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
   	el:'#registro',
   	data:{
   		pasajes:[],
   		destinos:[],
   		registros:[],
   		hora:''

   	},
   	methods:{
   		getPasajes:function(){
   			this.$http.get(urlP+'/'+this.hora)
   			.then(function(json){
   				var registro={
   					'nombre'
   					'fecha'
   					'hora'
   				}
   			})
   		}
   	}
})