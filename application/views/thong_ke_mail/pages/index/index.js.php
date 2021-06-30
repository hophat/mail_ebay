<?php
$dateNow = date("Y-m-d");
$date1 = str_replace('-', '/', $dateNow);
$dateENd = date('Y-m-d', strtotime($date1 . "-30 days"));
$period = new DatePeriod(
    new DateTime($dateENd),
    new DateInterval('P1D'),
    new DateTime($dateNow),
);
$days = [];
foreach ($period as $key => $value) {
    $days[]   = $value->format('Y-m-d');
}
$days = array_reverse($days);
array_unshift($days, $dateNow);
?>

<script>
    var index = {
        template: `<?php include 'index.html.php' ?>`,
        data() {
            return {
                listDate: <?= json_encode($days) ?>,
                dateSelect: "<?= date("Y-m-d") ?>",
                loadding: false,
                list: null,
                new: false
            }
        },
        created() {
            if (sessionStorage.getItem('dateSelect') != null) {
                this.dateSelect = sessionStorage.getItem('dateSelect');
            }
            this.get_chot_so();
            this.getList();
            // this.load_list_product(this.offset, this.limit);
            // this.get_list_partner();

        },
        beforeMount() {},
        mounted() {},
        watch: {
            success: function(val) {

                if (val == true) {
                    setTimeout(() => {
                        this.success = false;
                    }, 1500)
                }
            },
            page_number: function(val) {
                let show_num = this.page_size;
                this.limit = show_num;
                this.offset = (val - 1) * show_num;
            },
            product_type: function() {
                this.page_number = 1;
            }
        },
        methods: {
            new2() {
                this.lo_1 = ""
                this.lo_2 = ""
                this.lo_btl = ""
                this.de_1 = ""
                this.de_2 = ""
                this.de_3 = ""
                this.de_4 = ""
                this.de_5 = ""
                this.de_6 = ""

            },
            get_list_partner() {
                axios.get(this.base_url_common + '/get_list_partner').then((data) => {
                    if (!data.data) {
                        alert('KHông lấy được dữ liệu');
                        return;
                    }
                    this.list_parnter = data.data.data;
                })
            },
            load_list_product(offset, limit) {
                this.listLoading = true
                this.get_list_product(offset, limit).then(res => {
                    // res_data = res.data.data;
                    this.list_product = this.format_data(res.data.data.rows);
                    this.total_row = res.data.data.total;
                    this.listLoading = false;
                })
            },
            del(id_prod) {
                let form = new FormData();
                form.append('id_product', id_prod);
                axios.post(this.base_url_product + '/delsubmit_', form).then(e => {
                    if (e.data.status) {
                        this.notify_success(e.data.message);
                    } else {
                        this.notifi_error(e.data.message)
                    }
                })
            },
            formatPrice(value) {
                return formatPrice(value)
            },
            get_chot_so() {
                const Formdt = new FormData();
                let date = this.dateSelect;
                axios.post("<?= base_url('/Chotso/get_chot') ?>" + "/" + date).then(res => {
                    let out = res.data.data;
                    if (res.status) {
                        // console.log(res.data);
                        this.lo_1 = out.lo_1
                        this.lo_2 = out.lo_2
                        this.lo_btl = out.lo_btl
                        this.de_1 = out.de_1
                        this.de_2 = out.de_2
                        this.de_3 = out.de_3
                        this.de_4 = out.de_4
                        this.de_5 = out.de_5
                        this.de_6 = out.de_6
                        // this.lo_1 = out.lo_1
                    }
                })
            },
            getList() {
                const loading = this.$loading({});
                const Formdt = new FormData();
                let date = this.dateSelect;
                sessionStorage.setItem('dateSelect', date);
                axios.post("<?= base_url('/Thongke/get_list') ?>" + "/" + date).then(res => {
                    loading.close();
                    this.list = res.data;
                })
            },
            submit_() {
                this.load_list_product(this.offset, this.limit);
            },
            notify_success(mess) {
                this.$notify.success({
                    title: 'Thông báo',
                    message: mess
                });
            },
            handleCurrentChange(val) {
                // let offset = (val - 1) * 15;
                // let limit = val * 15;
                this.load_list_product(this.offset, this.limit);
            },
            notifi_error(mess) {
                this.$notify.error({
                    title: 'Thông báo',
                    message: mess
                });
            }
        }
    }
</script>