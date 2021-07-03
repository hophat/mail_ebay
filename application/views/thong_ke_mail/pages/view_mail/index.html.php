<div>
    <div class="container">
        <div class="row ">
            <!-- <div class="col-6">
                <h3>Thông kê</h3>
            </div> -->
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
            <div class="col-12 p-0 ">
                <table class="table table-bordered bg-light">
                    <thead class="bg-success">
                        <tr>
                            <th>STT</th>
                            <th>title</th>
                            <th>mail_date</th>
                            <th>Body</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in list" :style="(item.mail_seen == 1) ? 'background-color: #cdd9e6;' : ''">
                            <td>{{index}}</td>
                            <td>{{item.mail_title}}</td>
                            <td>{{item.mail_date}}</td>
                            <td>
                                <el-button @click="see(item)" type="primary" style="margin-left: 16px;">
                                    open
                                </el-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <el-drawer size="50%" title="I am the title" :visible.sync="drawer" :with-header="false">
        <div v-html="content_mail"></div>
    </el-drawer>
</div>