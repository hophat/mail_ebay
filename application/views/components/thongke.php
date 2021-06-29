<div class="container-fluild">
    <div class="row">
        <section class="col-12">
            <h4 class="header h4_thongke">THỐNG KÊ SỐ CHỐT NHIỀU NHẤT 26/06/2021</h4>
            <div id="stats" class="row stats div_thongke" style="margin-bottom: 20px;">
                <div class="col-6 left_thongke">
                    <p class="p_thongke p_thongke_loto">LÔTÔ</p>
                    <?php foreach ($list_lo_chon_nhieu  as $row) : ?>
                        <div class="col-12 divbs">
                            <div class="div_bor_tk right">
                                <span class="left leftlo"><?= $row['lo_total'] ?></span>
                                <?= $row['sort'] ?> lần
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-6 right_thongke">
                    <p class="p_thongke p_thongke_db">ĐẶC BIỆT</p>
                    <!-- <div class="col-12 divbs">
                        <div class="div_bor_tk right"><span class="left leftdb">81</span>3
                            lần
                        </div>
                    </div> -->

                    <?php foreach ($list_db_chon_nhieu  as $row) : ?>
                        <div class="col-12 divbs">
                            <div class="div_bor_tk right">
                                <span class="left leftdb"><?= $row['de'] ?></span>
                                <?= $row['sort'] ?> lần
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </section>
    </div>
</div>