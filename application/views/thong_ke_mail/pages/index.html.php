<section id="app" class="container">

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            Thống kê ebay
        </a>
        <div>
            <router-link to="/add">
                <el-button type="primary" size="small" icon="el-icon-set-up">Quản lý ebay</el-button>
            </router-link>
            <?php if ($_SESSION['user']['user_level'] == 1) : ?>
                <router-link to="/add_user">
                    <el-button type="primary" size="small" icon="el-icon-user-solid">Quản lý user</el-button>
                </router-link>
            <?php endif; ?>
            <a href="<?= base_url("Auth/logout") ?>">
                <el-button type="dark"   size="small" icon="el-icon-switch-button"></el-button>
            </a>
        </div>
    </nav>

    <router-view></router-view>

</section>