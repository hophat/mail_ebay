<script>
    var add_user = {
        template: `<?php include 'index.html.php' ?>`,
        data() {
            return {
                value1: true,
                value2: true,
                dateSelect: "<?= date("Y-m-d") ?>",
                loadding: false,
                list: null,
                new: false,
                editData: null,
                ruleForm: {
                    name: '',
                    email: '',
                    pass: '',
                    link_check: '',
                },
                ruleFormEdit: {
                    name: '',
                    email: '',
                    pass: '',
                    id: '',
                    link_check: '',
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
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        // console.log(valid);
                        // add
                        if (formName == 'ruleForm') {
                            let form = new FormData();
                            form.append('user_name', this.ruleForm.name);
                            form.append('user_pass', this.ruleForm.pass);
                            axios.post("<?= base_url('/User/add') ?>", form).then(e => {
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
                            form.append('user_name', this.ruleFormEdit.name);
                            form.append('user_pass', this.ruleFormEdit.pass);
                            axios.post("<?= base_url('/User/update') ?>", form).then(e => {
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
                form.append('user_name', id_prod);
                form.append('user_pass', id_prod);
                axios.post("<?= base_url('/User/get_list') ?>", form).then(e => {
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
                    form.append('user_id', id);
                    axios.post("<?= base_url('/User/del') ?>", form).then(e => {
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
            get(acc_id) {
                this.loadding = true;
                axios.get("<?= base_url('/User/get/') ?>" + acc_id).then(res => {
                    let data_ = res.data;
                    this.ruleFormEdit.name = data_.user_name;
                    // this.ruleFormEdit.pass = data_.acc_pass;
                })
            },
            getList() {
                this.loadding = true;
                const Formdt = new FormData();
                let date = this.dateSelect;
                axios.post("<?= base_url('/User/get_list') ?>").then(res => {
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