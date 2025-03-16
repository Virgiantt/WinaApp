<div class="container">

    <ol class="breadcrumb bg-light mt-3 mb-3">
        <li class="breadcrumb-item"><a href="<?= base_url('DashboardMember/index') ?>">Home</a></li>
        <li class="breadcrumb-item text-dark">Latihan</li>
    </ol>

    <h1 class="h3 text-gray-800">Latihan Try Out</h1>
    <p>Latih kemampuanmu dengan materi terbaru dan jadilah yang terdepan di antara teman-temanmu.</p>
    <div class="row">
        <div class="col-sm-12">

            <table class="table table-bordered  table-responsive-sm table-striped rounded" id="tableData">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Waktu</th>
                        <th>Jumlah Soal</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Latihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formDetail">
                    <div class="row">

                        <div class="col-sm-12 form-group text-dark mb-0">
                            <table class="table mb-0">
                                <tr>
                                    <td width="20%">Judul</td>
                                    <td width="1%">:</td>
                                    <td align="left" class="title"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-12 form-group text-dark mb-0">
                            <table class="table mb-0">
                                <tr>
                                    <td width="20%">Waktu (menit)</td>
                                    <td width="1%">:</td>
                                    <td align="left" class="time"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-12 form-group text-dark mb-0">
                            <table class="table mb-0">
                                <tr>
                                    <td width="20%">Jumlah Soal</td>
                                    <td width="1%">:</td>
                                    <td align="left" class="count_question">110</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-12 form-group text-dark mb-0">
                            <table class="table mb-0">
                                <tr>
                                    <td width="20%">Pembahasan</td>
                                    <td width="1%">:</td>
                                    <td align="left" class="description"></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <hr>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary mulai-latihan">Mulai Latihan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>