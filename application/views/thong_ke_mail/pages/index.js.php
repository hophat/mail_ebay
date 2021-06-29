<script type="text/javascript">
	var base_url = "<?= base_url() ?>";
</script>
<?php


include 'index/index.js.php';
include 'add_acc/index.js.php';
?>

<script>
	const routes = [{
			path: '/',
			component: index,
			props: true
		},
		{
			path: '/add',
			component: add,
			props: true
		},
	]

	const router = new VueRouter({
		routes
	})
	const app = new Vue({
		el: "#app",
		router,
		data() {
			return {
				ds_loai_ts: null,
				load: false,
				ten: '',
				mo_ta: '',
				errors: null
			}
		},
		components: {

		},
		mounted() {
			
		},
		created() {},
		methods: {},
	}).$mount('#app');
</script>