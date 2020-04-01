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
        <li class="nav-item">
            <span class="nav-link text-gray-dark">             
                <?= $_SESSION['elenka_username']?> 
            </span>
        </li>
        <!-- <li class="nav-item"></li> -->
        <!-- <span class="pl-2 pr-2" >|</span> -->
        <li class="nav-item">
            <a href="<?=BASEURL?>home/logout" class="nav-link bg-danger">
                <i class="fas fa-power-off"></i>
                <span>Logout</span>
            </a>
        </li>
        <?php endif; ?>
    </div>
</div>
</nav>
<!-- /.navbar -->