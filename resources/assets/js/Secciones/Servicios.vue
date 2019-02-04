<template>
	<div class="three-item-carousel owl-carousel owl-theme owl-dot-none owl-nav-style-one">
		
		<div class="service-block-six" v-for="row in rows">
			<div class="inner-box hvr-bounce-to-bottom">
				<div class="icon-box">
					<a :href="row.url">
						<img :src="row.imagen_home" :alt="row.titulo">
					</a>
				</div>
				<h4><a :href="row.url">{{ row.titulo }}</a></h4>
				<div class="text">{{ row.descripcion }}</div>
			</div>
		</div>
		
	</div>
</template>

<script>
	import Vue from 'vue'
	import axios from 'axios'
	
    export default {
        data: function () {
	        return {
	            loading: false,
		        rows: []
	        }
        },
	    mounted() {
            this.cargar();
	    },
	    methods: {
            loadScript: function() {
                $('.three-item-carousel').owlCarousel({
                    loop:true,
                    margin:30,
                    nav:true,
                    smartSpeed: 700,
                    autoplay: 5000,
                    navText: [
                        '<span class="flaticon-left-arrow-1"></span>',
	                    '<span class="flaticon-right-arrow"></span>'
                    ],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        800:{
                            items:2
                        },
                        1024:{
                            items:3
                        },
                        1200:{
                            items:3
                        },
                    }
                });
            },
            cargar: function () {
                var vm = this;
	            this.loading = true;
	            axios.get("/widget/servicios").then(response => {
	                this.rows = response.data;
	                this.loading = false;
	                
	                Vue.nextTick(function () {
		                vm.loadScript();
                    }).bind(vm);
	            }).catch(error => {
	                this.loading = false;
	            });
            }
	    }
    }
</script>

<style scoped>
	.service-block-six .inner-box .icon-box{
		margin: 0 auto 10px;
	}
</style>