<section id="app" class="container">

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            Thống kê ebay
        </a>
        <div>
            <router-link to="/add">
                <el-button type="primary" size="small" icon="el-icon-set-up">Quản lý</el-button>
            </router-link>
            <a href="<?= base_url("Auth/logout") ?>">
                <el-button type="dark" roun size="small" icon="el-icon-switch-button">Logout</el-button>
            </a>
        </div>
    </nav>

    <router-view></router-view>

</section>