<div>


    <div class="container">
        <div class="row ">
            <!-- <div class="col-6">
                <h3>Thông kê</h3>
            </div> -->
            <div class="col-12 pb-2 pt-2 pl-0">
                <template>
                    <el-select filterable @change="getList()" v-model="dateSelect" placeholder="Select">
                        <el-option v-for="item in listDate" :key="item" :label="item" :value="item">
                        </el-option>
                    </el-select>
                </template>
            </div>
            <div class="col-8 pb-2 pt-2 pl-0 text-right">
                <!-- <label for=""><span class="badge badge-success" style="font-size: 1.2em;">Chat : 12</span></label>
                <label for=""><span class="badge badge-warning" style="font-size: 1.2em;">mess : 12</span></label> -->

            </div>

            <div class="col-12 p-0 ">
                <table class="table table-bordered bg-light">
                    <thead class="bg-success">
                        <tr>
                            <th>STT</th>
                            <th>Bán</th>
                            <th>Chat</th>
                            <th>khác</th>
                            <th>Status</th>
                            <th>is Connect</th>
                            <th>Ngày</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in list">
                            <td>{{item.acc_name}}</td>
                            <td class="text-danger ">
                                <router-link style="color: red;" :to="'/view/save/'+item.acc_id+'/'+item.date">
                                    <el-link type="danger" style="font-size: 20px;font-weight: bold; ">({{ item.save }})</el-link>
                                </router-link>
                            </td>
                            <td>
                                <router-link :to="'/view/mess/'+item.acc_id+'/'+item.date">
                                    <el-link type="primary" style="font-size: 20px;font-weight: bold; ">({{ item.mess }})</el-link>
                                </router-link>
                            </td>

                            <td>
                                <router-link :to="'/view/orther/'+item.acc_id+'/'+item.date">
                                    <el-link style="font-size: 20px;font-weight: bold; ">({{ item.other }})</el-link>
                                </router-link>
                            </td>

                            <td>
                                <label for="" v-if="item.code_status == false" class="text-danger">Die</label>
                                <label for="" v-if="item.code_status == true" class="text-success">Active</label>
                                <!-- {{(item.code_status == true) ? 'active' : 'die'}} -->
                            </td>
                            <td>
                                <label for="" v-if="item.is_connect == 0" class="text-danger">Die</label>
                                <label for="" v-if="item.is_connect == 1" class="text-success">Active</label>
                                <!-- {{(item.code_status == true) ? 'active' : 'die'}} -->
                            </td>
                            <td>{{item.date}}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>