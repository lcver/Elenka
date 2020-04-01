  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$page['page']?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=BASEURL?>">Home</a></li>
                <?php if(isset($page['subPage'])): ?>
                  <li class="breadcrumb-item"><a href="<?=BASEURL.$page['page']?>"><?=$page['page']?></a></li>
                  <li class="breadcrumb-item active"><?= $page['subPage'] ?></li>
                <?php else: ?>
                  <li class="breadcrumb-item"><?=$page['page']?></li>
                <?php endif; ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
