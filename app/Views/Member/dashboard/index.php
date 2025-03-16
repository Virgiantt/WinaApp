<?= $this->include('Member/app/header.php'); ?>
<?= $this->include('Member/app/navbar.php'); ?>

<div class="container">

    <h1 class="h3 text-gray-800">Bimbingan Belajar CPNS & Sekolah Kedinasan Winaya Laksa</h1>
    <h5 class="text-dark">Selesaikan try out untuk melatih kemampuan kamu.</h5>

    <ol class="breadcrumb bg-light mt-4">
        <li class="breadcrumb-item"><a href="<?= base_url('Member/dashboard') ?>">Home</a></li>
    </ol>

    <div class="row" style="margin-bottom:250px">
        <a href="<?= base_url("DashboardMember/soal") ?>" class="col-sm-5 text-decoration-none">
            <div class="bg-warning p-4 my-3 text-white rounded shadow" style="min-height: 160px;">
                <h3>Try Out</h3>
                <p>Uji kesiapanmu dengan tryout kami, tantang dirimu untuk menjadi yang terbaik di antara yang lain!</p>
            </div>
        </a>

        <a href="<?= base_url("DashboardMember/latihan") ?>" class="col-sm-5 text-decoration-none">
            <div class="bg-warning p-4 my-3 text-white rounded shadow" style="min-height: 160px;">
                <h3>Latihan</h3>
                <p>Latih kemampuanmu dengan materi terbaru dan jadilah yang terdepan di antara teman-temanmu.</p>
            </div>
        </a>
        <a href="<?= base_url("DashboardMember/hasil") ?>" class="col-sm-5 text-decoration-none">
            <div class="bg-warning p-4 my-3 text-white rounded shadow" style="min-height: 160px;">
                <h3>Hasil</h3>
                <p>Lihat hasil upayamu! Bandingkan dan analisis performamu dengan pengguna lain.</p>
            </div>
        </a>

        <div data-toggle="modal" data-target="#detailModal" class="col-sm-5 text-decoration-none">
            <div class="bg-warning p-4 my-3 text-white rounded shadow" style="min-height: 160px;cursor: pointer;">
                <h3>Pengumuman</h3>
            </div>
        </div>

    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <h5 style="line-height: 30px;"></h5>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->include('Member/app/footer.php'); ?>