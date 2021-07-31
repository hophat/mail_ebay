<div>
    <div class="container">
        <div class="row ">
            <div class="col-12 p-0">
                <div class="alert alert-info" role="alert">
                    Quản lý Acc
                </div>
            </div>
            <div class="col-4 pb-2 pt-2 pl-0">
                <template>
                    <router-link to="/">
                        <el-button icon="el-icon-arrow-left" type="info">Back</el-button>
                    </router-link>
                    <!-- <el-select filterable @change="getList()" v-model="dateSelect" placeholder="Select">
                        <el-option v-for="item in listDate" :key="item" :label="item" :value="item">
                        </el-option>
                    </el-select> -->
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
                            <th>Acc</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in list">
                            <td>{{index}}</td>
                            <td>{{item.acc_name}}</td>
                            <td>
                                <el-switch @change=" active(item.acc_id, item.acc_actived) " v-model="item.acc_actived">
                                </el-switch>
                            </td>
                            <td style="width: 200px;">
                                <el-button icon="el-icon-edit" data-toggle="modal" data-target="#editModal" @click="get(item.acc_id)" type="primary" size="mini">Edit</el-button>
                                <el-button icon="el-icon-delete" type="danger" @click="del(item.acc_id)" size="mini"></el-button>
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
                    <h5 class="modal-title" id="addModal">Thêm mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="80px">
                        <el-form-item label="Name" prop="name">
                            <el-input v-model="ruleForm.name"></el-input>
                        </el-form-item>
                        <el-form-item label="Email" prop="email">
                            <el-input v-model="ruleForm.email"></el-input>
                        </el-form-item>

                        <el-form-item label="Password" prop="pass">
                            <el-input type="text" v-model="ruleForm.pass"></el-input>
                        </el-form-item>
                        <el-form-item label="link_check" prop="link_check">
                            <el-input v-model="ruleForm.link_check"></el-input>
                        </el-form-item>
                        
                        <el-form-item label="Test" >
                            <el-button type='warning' @click="test_connect(ruleForm.email,ruleForm.pass)">Test connect</el-button>
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
                    <el-form :model="ruleFormEdit" :rules="rules" ref="ruleFormEdit" label-width="80px">
                        <el-form-item label="Name" prop="name">
                            <el-input v-model="ruleFormEdit.name"></el-input>
                        </el-form-item>
                        <el-form-item label="Email" prop="email">
                            <el-input v-model="ruleFormEdit.email"></el-input>
                        </el-form-item>
                        <el-form-item label="Password" prop="pass">
                            <el-input type="text" v-model="ruleFormEdit.pass"></el-input>
                        </el-form-item>
                        <el-form-item label="link_check" prop="link_check">
                            <el-input v-model="ruleFormEdit.link_check"></el-input>
                        </el-form-item>

                        <el-form-item label="Test" >
                            <el-button type='warning' @click="test_connect(ruleFormEdit.email,ruleFormEdit.pass)">Test connect</el-button>
                        </el-form-item>

                        <el-form-iem>
                            <el-button type="primary" @click="submitForm('ruleFormEdit')">update</el-button>
                        </el-form-iem>
                    </el-form>
                </div>
            </div>
        </div>
    </div>


</div>