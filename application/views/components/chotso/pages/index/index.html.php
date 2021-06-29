<div class="row">
    <section id="section_chotso " class="col-12 p-0">
        <h4 class="header h4_thongke"><span>CHỐT SỐ CỦA THÀNH VIÊN</span>
            <div class="div_select">
                <el-select @change="get_list" v-model="dateSelect" placeholder="Select">
                    <el-option v-for="item in listDate" :key="item" :label="item" :value="item">
                    </el-option>
                </el-select>
            </div>
        </h4>
        <input type="hidden" id="input_token" value="2WgVaWmDPGg5TMoYJ8SVfyJRnrGyl98czQ2e75wD">
        <div id="div_loto_online" class="post notice col-12 p-1">
            <?php if (AUTHED == 1) : ?>

                <el-table stripe v-loading="loadding" :data="list" style="width: 100%">
                    <el-table-column label="Khách">
                        <template slot-scope="scope">
                            <div class="row user-info" style="text-align: center;">
                                <div class="col-3 avt-loto"><a href="#"><img class="avt_chat" :src="scope.row.user_avatar" alt="assassin28b1" data-pin-nopin="true"></a></div>
                                <div class="col-8 name-loto"><a href="#" style="padding: 0px;margin: 2px;">{{scope.row.user_name}}</a>
                                    <span class="point-loto">Lô: {{scope.row.user_diem_lo}} điểm </span>
                                    <span class="point-loto">ĐB: {{scope.row.user_diem_db}} điểm </span>
                                </div>
                            </div>
                        </template>
                    </el-table-column>
                    <el-table-column label="Chốt">
                        <template slot-scope="scope">
                            <div class=" div_ct_right">
                                <div><span class="blue"><b>Lô: </b></span>{{scope.row.lo_1}}-{{scope.row.lo_2}}<span class="orange orangebtl"><b>BTL: </b></span>
                                    {{scope.row.lo_btl}}
                                </div>
                                <div class="p_db">
                                    <span class="text-danger">ĐB: </span>{{scope.row.de_1}}-{{scope.row.de_2}}-{{scope.row.de_3}}-{{scope.row.de_4}}-{{scope.row.de_5}}-{{scope.row.de_6}}
                                </div>
                            </div>
                        </template>
                    </el-table-column>

                </el-table>

                <!-- <el-pagination background layout="prev, pager, next" :total="1000">
                </el-pagination> -->
                <!-- <el-divider></el-divider> -->
                <hr>
                <el-row class="p-1">
                    <el-button type="success" data-toggle="modal" @click="new2" data-target="#ssss1" size="small">Chốt số</el-button>
                    <el-button type="warning" data-toggle="modal" @click="get_chot_so" data-target="#ssss1" size="small">Chốt lại</el-button>
                </el-row>
            <?php else : ?>
                <div class="row" style="padding: 20px;">

                    <div class="col-2 col-md-1"><img src="https://chotlo.com/images/icon_dangnhap.png" alt="chat"></div>
                    <div class="col-10 col-md-11" style="margin-top: 10px">Bạn hãy <a style="color:#5d8ff2" data-toggle="modal" data-target="#exampleModal" href="#">Đăng nhập</a>
                        để chốt số

                    </div>
                </div>
            <?php endif ?>

        </div>
    </section>
    <div class="modal fade" id="ssss1" tabindex="-1" role="dialog" aria-labelledby="ssss1" aria-hidden="true">
        <div class="modal-dialog" style="    top: 20%;" role="document">
            <div class="modal-content p-3">
                <div class="bg-akx-epp col-12 ">
                    <div class="divm-ax">
                        <h5>Chốt số {{dateSelect}} </h5>
                    </div>
                    <div class="row">
                        <div class="col-6 div_chot div_chot_lo"><span class="span_title">LÔ</span>
                            <input type="tel" class="input_chot lo1" maxlength="2" minlength="2" v-model="lo_1">
                            <input type="tel" class="input_chot lo2" maxlength="2" minlength="2" v-model="lo_2">
                        </div>
                        <div class="col-4 div_chot div_chot_btl"><span class="span_title">BTL</span>
                            <input type="tel" class="input_chot btl" maxlength="2" minlength="2" v-model="lo_btl">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 div_chot div_chot_de"><span class="span_title">ĐB</span>
                            <input type="tel" class="input_chot de1" maxlength="2" minlength="2" min="0" max="99" v-model="de_1">
                            <input type="tel" class="input_chot de2" maxlength="2" minlength="2" min="0" max="99" v-model="de_2">
                            <input type="tel" class="input_chot de3" maxlength="2" minlength="2" min="0" max="99" v-model="de_3">
                            <input type="tel" class="input_chot de4" maxlength="2" minlength="2" min="0" max="99" v-model="de_4">
                            <input type="tel" class="input_chot de5" maxlength="2" minlength="2" min="0" max="99" v-model="de_5">
                            <input type="tel" class="input_chot de6" maxlength="2" minlength="2" min="0" max="99" v-model="de_6">
                        </div>
                    </div>
                    <div id="div_bor_btn_chot" class="btn-group">
                        <button id="bt_chot" @click="cholo" type="button" class="btn btn-primary choose bt_chot">Chốt số
                        </button>
                        <!-- <button type="button" @click="cholo"  value="true" class="btn btn-danger reChoose">Chốt
                            lại
                        </button> -->
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>