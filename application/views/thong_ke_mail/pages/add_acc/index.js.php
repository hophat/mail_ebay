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
    var add = {
        template: `<?php include 'index.html.php' ?>`,
        data() {
            return {
                value1: true,
                value2: true,
                listDate: <?= json_encode($days) ?>,
                dateSelect: "<?= date("Y-m-d") ?>",
                loadding: false,
                list: null,
                new: false,
                editData: null,
                ruleForm: {
                    name: '',
                    email: '',
                    pass: '',
                },
                ruleFormEdit: {
                    name: '',
                    email: '',
                    pass: '',
                    id: '',
                },
                rules: {
                    name: [{
                        required: true,
                        message: 'Please input name',
                        trigger: 'blur'
                    }, ],
                    email: [{
                            required: true,
                            message: 'Please input email address',
                            trigger: 'blur'
                        }, ,
                        {
                            type: 'email',
                            message: 'Please input correct email address',
                            trigger: ['blur', 'change']
                        }
                    ],
                    pass: [{
                        required: true,
                        message: 'Please input password',
                        trigger: 'blur'
                    }, , ],
                }
            }
        },
        created() {
            this.getList();
        },
        beforeMount() {},
        mounted() {
            // const loading = this.$loading({
            //     lock: true,
            //     text: 'Loading',
            //     spinner: 'el-icon-loading',
            //     // background: 'rgba(0, 0, 0, 0.7)'
            // });
            // setTimeout(() => {
            //     loading.close();
            // }, 1000);


        },
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
                    // res_data = res.data.data;
                    this.list_product = this.format_data(res.data.data.rows);
                    this.total_row = res.data.data.total;
                    this.listLoading = false;
                })
            },
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        // console.log(valid);
                        // add
                        if (formName == 'ruleForm') {
                            let form = new FormData();
                            form.append('acc_name', this.ruleForm.name);
                            form.append('acc_email', this.ruleForm.email);
                            form.append('acc_pass', this.ruleForm.pass);
                            axios.post("<?= base_url('/Acc/add') ?>", form).then(e => {
                                if (e.data.status) {
                                    this.notify_success("Success");
                                    $('#addModal').modal('hide');
                                    this.getList();
                                } else {
                                    this.notifi_error("Đã tồn tài");
                                }
                            })
                        }
                        // edit
                        if (formName == 'ruleFormEdit') {
                            let form = new FormData();
                            form.append('acc_name', this.ruleFormEdit.name);
                            form.append('acc_email', this.ruleFormEdit.email);
                            form.append('acc_pass', this.ruleFormEdit.pass);
                            form.append('acc_id', this.ruleFormEdit.id);
                            axios.post("<?= base_url('/Acc/update') ?>", form).then(e => {
                                if (e.data.status) {
                                    this.notify_success("Success");
                                    $('#editModal').modal('hide');
                                    this.getList();
                                } else {
                                    this.notifi_error("Update lỗi");
                                }
                            })
                        }

                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            edit() {
                let form = new FormData();
                form.append('acc_name', id_prod);
                form.append('acc_email', id_prod);
                form.append('acc_pass', id_prod);
                axios.post("<?= base_url('/Acc/get_list') ?>", form).then(e => {
                    if (e.data.status) {
                        this.notify_success(e.data.message);
                    } else {
                        this.notifi_error(e.data.message)
                    }
                })
            },
            active(id, value) {
                let form = new FormData();
                let acitve = (value == true) ? 1 : 0;
                form.append('acc_actived', acitve);
                form.append('acc_id', id);
                axios.post("<?= base_url('/Acc/active') ?>", form).then(e => {
                    if (e.data.status) {
                        // this.notify_success("Thành công");
                        this.$message({
                            message: 'Thành công',
                            type: 'success'
                        });
                        // this.getList();
                    } else {
                        this.$message({
                            message: 'Thất bại',
                            type: 'error'
                        });
                    }
                })
            },
            del(id) {
                this.$confirm('Bạn có muốn xóa không?', 'Warning', {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                }).then(() => {
                    let form = new FormData();
                    form.append('acc_id', id);
                    axios.post("<?= base_url('/Acc/del') ?>", form).then(e => {
                        if (e.data.status) {
                            // this.notify_success("Thành công");
                            this.$message({
                                message: 'Thành công',
                                type: 'success'
                            });
                            this.getList();
                        } else {
                            this.$message({
                                message: 'Thất bại',
                                type: 'error'
                            });
                        }
                    })
                })


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
            get(acc_id) {
                this.loadding = true;
                axios.get("<?= base_url('/Acc/get/') ?>" + acc_id).then(res => {
                    let data_ = res.data;
                    this.ruleFormEdit.email = data_.acc_email;
                    this.ruleFormEdit.name = data_.acc_name;
                    this.ruleFormEdit.pass = data_.acc_pass;
                    this.ruleFormEdit.id = acc_id;
                })
            },
            getList() {
                this.loadding = true;
                const Formdt = new FormData();
                let date = this.dateSelect;
                axios.post("<?= base_url('/Acc/get_list') ?>").then(res => {
                    this.list = res.data;
                    this.loadding = false;
                    console.log(this.list);

                })
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