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
    var view_index = {
        template: `<?php include 'index.html.php' ?>`,
        data() {
            return {
                value1: true,
                drawer: false,
                content_mail: '',
                value2: true,
                listDate: <?= json_encode($days) ?>,
                dateSelect: "<?= date("Y-m-d") ?>",
                loadding: false,
                list: null,
                dateSelect: '',
                mail_type: '',
                acc_id: '',
            }
        },
        created() {
            parameters = this.$route.params
            this.dateSelect = parameters.date;
            this.mail_type = parameters.type;
            this.acc_id = parameters.id;
            this.get_list_mail();
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
                    this.list_product = this.format_data(res.data.data.rows);
                    this.total_row = res.data.data.total;
                    this.listLoading = false;
                })

            },
            get_list_mail() {
                const Formdt = new FormData();
                this.dateSelect;
                axios.post("<?= base_url('/Thongke/get_list_mail_type') ?>" + "/" + this.dateSelect + "/" + this.mail_type + "/" + this.acc_id).then(res => {
                    this.list = res.data;
                    // console.log(this.list);
                    if (res.status) {
                        // console.log(out);
                    }
                })
            },
            see(item) {
                this.drawer = true;
                this.content_mail = item.mail_body;
            },
            notify_success(mess) {
                this.$notify.success({
                    title: 'Thông báo',
                    message: mess
                });
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