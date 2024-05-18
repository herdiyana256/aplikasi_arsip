<?= $this->extend('layouts/page_layouts') ?>

<?= $this->section('content') ?>
<div class="row">

    <div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url(); ?>arsip/store" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>No.Surat</label>
                    <input type="text" class="form-control" name="no_surat" required>
                  </div>
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" required>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori">
                        <option value="Surat">Surat</option>
                        <option value="Arsip Lainnya">Arsip Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Lampiran</label>
                    <br>
                    <input type="file" name="file" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>