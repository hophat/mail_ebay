<div>
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <h4>Quản lý tài khoản</h4>
            </div>
            <div class="col-4 pb-2 pt-2 pl-0">
                <template>
                    <router-link to="/">
                        <el-button icon="el-icon-arrow-left" type="info">Back</el-button>
                    </router-link>
                </template>
            </div>
            <div class="col-8 pb-2 pt-2 pl-0 text-right">
                <el-button icon="el-icon-plus" type="primary" data-toggle="modal" data-target="#addModal">Thêm</el-button>
            </div>
            <div class="col-12 p-0 ">
                <table class="table table-bordered bg-light">
                    <thead class="bg-success">
                        <tr>
                            <th>STT</th>
                            <th>Tài khoản</th>
                            <th>SL EBay</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in list">
                            <td>{{index}}</td>
                            <td>{{item.user_name}}</td>
                            <td>{{item.total_acc}}</td>
                            <!-- <td>
                                <el-switch @change=" active(item.acc_id, item.acc_actived) " v-model="item.acc_actived">
                                </el-switch>
                            </td> -->
                            <td style="width: 200px;">
                                <el-button icon="el-icon-edit" data-toggle="modal" data-target="#editModal" @click="get(item.user_id)" type="primary" size="mini">Edit</el-button>
                                <el-button icon="el-icon-delete" type="danger" @click="del(item.user_id)" size="mini"></el-button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModal">Thêm User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="80px">
                        <el-form-item label="Username" prop="name">
                            <el-input v-model="ruleForm.name"></el-input>
                        </el-form-item>
                        <el-form-item label="Password" prop="pass">
                            <el-input type="text" v-model="ruleForm.pass"></el-input>
                        </el-form-item>

                        <el-form-iem>
                            <el-button type="primary" @click="submitForm('ruleForm')">Create</el-button>
                        </el-form-iem>
                    </el-form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit acc</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <el-form :model="ruleFormEdit" :rules="rules" ref="ruleFormEdit" >
                        <el-form-item label="UserName" prop="name">
                            <el-input disabled v-model="ruleFormEdit.name"></el-input>
                        </el-form-item>
                        <el-form-item label="Change Password" prop="pass">
                            <el-input type="text" v-model="ruleFormEdit.pass"></el-input>
                        </el-form-item>
                        <el-form-iem>
                            <el-button type="primary" @click="submitForm('ruleFormEdit')">Đổi pass</el-button>
                        </el-form-iem>
                    </el-form>
                </div>
            </div>
        </div>
    </div>


</div>