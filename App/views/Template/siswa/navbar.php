<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
<div class="container">
    <a href="#" class="navbar-brand">
    <img src="<?=BASEURL?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
    <span class="brand-text font-weight-light">Elenka</span>
    </a>
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASEURL?>" class="nav-link">Home</a>
        </li>
    </ul>

    <div class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['elenka_usersession'])) : ?>
        <li class="nav-item dropdown">
            <span class="nav-link text-gray-dark text-sm" data-toggle="dropdown">
                <?= $_SESSION['elenka_username']?> 
            </span>
            <div class="dropdown-menu dropdown-menu-md">
                <div class="dropdown-item" data-toggle="dropdown">
                    <a href="<?=BASEURL?>home/logout" class="btn btn-danger" data-toggle="dropdown">
                        <i class="fas fa-power-off"></i>
                        <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </li>
        <!-- <li class="nav-item"></li> -->
        <!-- <li class="nav-item">
        </li> -->
        <?php endif; ?>
    </div>
</div>
</nav>
<!-- /.navbar -->