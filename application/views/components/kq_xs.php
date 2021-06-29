<div class="container">
    <div class="row">

        <section id="ket-qua" class="col-12">
            <div class="row">
                <div class="col-12">
                    <div id="div_bor_ketqua">
                        <div id="div_title_ketqua">
                            <h2>Kết quả xổ số Miền bắc</h2>
                            <p class="p_title_date"><?= date('d/m/Y', strtotime($xs['date']))  ?></p>
                            <!-- <p class="p_prev"><a href="/ket-qua/mien-bac?date=2021-06-22"><img style="height: 14px;" src="https://chotlo.com/images/icon_next.png" alt="next lại"></a> -->
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped ">
                                <tbody>
                                    <tr class="tr_db">
                                        <th class="col-2 th_title">Đặc biệt</th>
                                        <th class="red th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 100%"><?= $xs['db'][0] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th_title">Giải nhất</th>
                                        <th class="th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 100%"><?= $xs['nhat'][0] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th_title">Giải nhì</th>
                                        <th class="th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 50%"><?= $xs['nhi'][0] ?></li>
                                                <li class="" style="width: 50%"><?= $xs['nhi'][1] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th_title">Giải ba</th>
                                        <th class="th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 33.33333%"><?= $xs['ba'][0] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['ba'][1] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['ba'][2] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['ba'][3] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['ba'][4] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['ba'][5] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th_title">Giải tư</th>
                                        <th class="th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 25%"><?= $xs['tu'][0] ?></li>
                                                <li class="" style="width: 25%"><?= $xs['tu'][1] ?></li>
                                                <li class="" style="width: 25%"><?= $xs['tu'][2] ?></li>
                                                <li class="li_bor_top" style="width: 25%"><?= $xs['tu'][3] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th_title">Giải năm</th>
                                        <th class="th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 33.33333%"><?= $xs['nam'][0] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['nam'][1] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['nam'][2] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['nam'][3] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['nam'][4] ?></li>
                                                <li class="" style="width: 33.33333%"><?= $xs['nam'][5] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th_title">Giải sáu</th>
                                        <th class="th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 33.333333333333%"><?= $xs['sau'][0] ?></li>
                                                <li class="" style="width: 33.333333333333%"><?= $xs['sau'][1] ?></li>
                                                <li class="" style="width: 33.333333333333%"><?= $xs['sau'][2] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th_title">Giải bẩy</th>
                                        <th class="th_number">
                                            <ul class="ul_ketqua">
                                                <li class="" style="width: 25%"><?= $xs['bay'][0] ?></li>
                                                <li class="" style="width: 25%"><?= $xs['bay'][1] ?></li>
                                                <li class="" style="width: 25%"><?= $xs['bay'][2] ?></li>
                                                <li class="" style="width: 25%"><?= $xs['bay'][3] ?></li>
                                            </ul>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table_tk_ketqua">
                            <tbody>
                                <tr class="info">
                                    <th class="">Đầu</th>
                                    <th>Lô Tô</th>
                                </tr>
                                <?php

                                for ($i = 0; $i < 10; $i++) :
                                ?>
                                    <tr>
                                        <td class="number_title"><?= $i ?></td>
                                        <td class="number_ketqua"><?= $xs_dau['lo_dau_' . $i] ?></td>
                                    </tr>
                                <?php

                                endfor;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <table class="table table-bordered table-striped table_tk_ketqua">
                        <tbody>
                            <tr class="info">
                                <th class="">Đuôi</th>
                                <th>Lô Tô</th>
                            </tr>
                            <?php

                            for ($i = 0; $i < 10; $i++) :
                            ?>
                                <tr>
                                    <td class="number_title"><?= $i ?></td>
                                    <td class="number_ketqua"><?= $xs_duoi['lo_duoi_' . $i] ?></td>
                                </tr>
                            <?php
                            endfor;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>