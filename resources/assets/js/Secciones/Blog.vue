<template>
	<section class="blog-section sp-two">
		<div class="container">
			<div class="sec-title centered style-two">
				<h1>Nuestro Blog</h1>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 news-block-two" v-for="row in rows">
					<div class="inner-box hvr-float-shadow">
						<div class="lower-content">
							<div class="category">
								<a :href="row.categoria.url">{{ row.categoria.titulo }}</a>
							</div>
							<h4><a :href="row.url">{{ row.titulo }}</a></h4>
							<div class="text">{{ row.descripcion }}</div>
							<div class="link-btn">
								<a :href="row.url" class="read-more-btn">Seguir leyendo <span class="fa fa-long-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
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
		    cargar: function () {
			    this.loading = true;
			    axios.get("/widget/noticias").then(response => {
			        this.rows = response.data.data;
			        this.loading = false;
			    }).catch(error =>{
			        this.loading = false;
			    });
		    }
		}
    }
</script>