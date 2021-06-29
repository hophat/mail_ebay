<section>
    <h4 class="header h4_thongke">TOP 10 CAO THỦ CHỐT SỐ CHUẨN</h4>
    <!-- <div id="bor_div_ct">
        <a class="a_caothu a_active" data="0">Cao thủ lô tô &nbsp;</a>|
        <a class="a_caothu" data="1">&nbsp; Cao thủ
            giải ĐB</a>
    </div> -->
    <nav id="bor_div_ct">

        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> Cao thủ lô tô</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cao thủ BTL</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cao thủ ĐB</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="list-top-loto list-top-loto0 col-12 p-0">
                <table class="table table-striped ">
                    <tbody>
                        <?php $i = 1;
                        foreach ($top_lo as $row) : ?>
                            <tr>
                                <td class="td_stt"> Top <?= $i ?></td>
                                <td style="cursor: pointer;text-align: center;">
                                    <div class="row user-info" style="text-align: center;">
                                        <div class="col-3 avt-loto"><a href="#"><img class="avt_chat" src="<?= $row['user_avatar'] ?>" data-pin-nopin="true"></a></div>
                                        <div class="col-8 name-loto"><a href="#" style="padding: 0px;margin: 2px;"><?= $row['user_name'] ?></a><span class="point-loto">Lô: <?= $row['user_diem_lo'] ?> điểm </span></div>
                                    </div>
                                </td>
                                <td class="td_right_chot">
                                    <div class=" div_ct_right">
                                        <p class="p_time_chot">
                                            <i>Chốt <?= date('d/m/Y') ?></i>
                                        </p>
                                        <p><span class="blue"><b>Lô: </b></span><?= $row['chotso']['lo_1'] ?>-<?= $row['chotso']['lo_2'] ?>
                                            <!-- <span class="orange orangebtl"><b>BTL: </b></span><?= $row['chotso']['lo_btl'] ?> -->
                                        </p>
                                    </div>

                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <!-- BTL -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="list-top-loto list-top-loto0 col-12 p-0">
                    <table class="table table-striped ">
                        <tbody>
                            <?php $i = 1;
                            foreach ($top_btl as $row) : ?>
                                <tr>
                                    <td class="td_stt"> Top <?= $i ?></td>
                                    <td style="cursor: pointer;text-align: center;">
                                        <div class="row user-info" style="text-align: center;">
                                            <div class="col-3 avt-loto"><a href="#"><img class="avt_chat" src="<?= $row['user_avatar'] ?>" data-pin-nopin="true"></a></div>
                                            <div class="col-8 name-loto"><a href="#" style="padding: 0px;margin: 2px;"><?= $row['user_name'] ?></a>
                                                <span class="point-loto">BTL: <?= $row['user_diem_btl'] ?> điểm </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="td_right_chot">
                                        <div class=" div_ct_right">
                                            <p class="p_time_chot">
                                                <i>Chốt <?= date('d/m/Y') ?></i>
                                            </p>
                                            <p>
                                                <span class="orange orangebtl"><b>BTL: </b></span><?= $row['chotso']['lo_btl'] ?>
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="list-top-loto list-top-loto0 col-12 p-0">
                    <table class="table table-striped ">
                        <tbody>
                            <?php $i = 1;
                            foreach ($top_db as $row) : ?>
                                <tr>
                                    <td class="td_stt"> Top <?= $i ?></td>
                                    <td style="cursor: pointer;text-align: center;">
                                        <div class="row user-info" style="text-align: center;">
                                            <div class="col-3 avt-loto"><a href="#"><img class="avt_chat" src="<?= $row['user_avatar'] ?>" data-pin-nopin="true"></a></div>
                                            <div class="col-8 name-loto"><a href="#" style="padding: 0px;margin: 2px;"><?= $row['user_name'] ?></a>
                                                <span class="point-loto">ĐB: <?= $row['user_diem_db'] ?> điểm </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="td_right_chot">
                                        <div class=" div_ct_right">
                                            <p class="p_time_chot">
                                                <i>Chốt <?= date('d/m/Y') ?></i>
                                            </p>
                                            <p>
                                                <span class="orange orangebtl"><b>ĐB: </b></span>
                                                <br>
                                                <?= $row['chotso']['de_1'] ?>
                                                <?= empty($row['chotso']['de_2']) ? '00' : $row['chotso']['de_2'] . "-" ?>
                                                <?= empty($row['chotso']['de_3']) ? '00' : $row['chotso']['de_3'] . "-" ?>
                                                <?= empty($row['chotso']['de_4']) ? '00' : $row['chotso']['de_4'] . "-" ?>
                                                <?= empty($row['chotso']['de_5']) ? '00' : $row['chotso']['de_5'] . "-" ?>
                                                <?= empty($row['chotso']['de_6']) ? '00' : $row['chotso']['de_6'] . "-" ?>
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>