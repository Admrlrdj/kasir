<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><span id="userCount"><?= count($usertotal) ?></span></h3>

            <p>User</p>
        </div>
        <div class="icon">
            <i class="nav-icon far fa-solid fa-user"></i>
        </div>
        <a href="<?= base_url('User') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><span id="categoryCount"><?= count($kategoritotal) ?></span></h3>

            <p>Kategori</p>
        </div>
        <div class="icon">
            <i class="nav-icon fas fa-solid fa-bars"></i>
        </div>
        <a href="<?= base_url('Kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><span id="productCount"><?= count($produktotal) ?></span></h3>

            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="nav-icon fas fa-solid fa-boxes"></i>
        </div>
        <a href="<?= base_url('Produk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
            <h3><span id="unitCount"><?= count($satuantotal) ?></span></h3>

            <p>Satuan</p>
        </div>
        <div class="icon">
            <i class="nav-icon fas fa-solid fa-tag"></i>
        </div>
        <a href="<?= base_url('Satuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-orange">
        <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Today's Income</span>
            <span class="info-box-number">Rp4.200.000,00</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>

<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-warning">
        <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Income of the Month</span>
            <span class="info-box-number">Rp126.000.000,00</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>

<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-lime">
        <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Income of the Year</span>
            <span class="info-box-number">Rp1.512.000.000,00</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateCounts() {
        $.ajax({
            url: "<?= base_url('Admin/GetCounts') ?>",
            method: "GET",
            dataType: "json",
            success: function(response) {
                $("#userCount").text(response.userCount);
                $("#categoryCount").text(response.categoryCount);
                $("#productCount").text(response.productCount);
                $("#unitCount").text(response.unitCount);
            }
        });
    }

    // Panggil fungsi pertama kali
    updateCounts();

    // Panggil fungsi secara berkala (misalnya setiap 10 detik)
    setInterval(updateCounts, 10000); // 10000 milliseconds = 10 seconds
</script>