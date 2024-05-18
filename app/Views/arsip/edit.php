<?= $this->extend('layouts/page_layouts') ?>

<?= $this->section('content') ?>
<div class="row">

    <div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url(); ?>arsip/update" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $arsip->id; ?>">
                  <div class="form-group">
                    <label>No.Surat</label>
                    <input type="text" class="form-control" name="no_surat" value="<?php echo $arsip->no_surat; ?>">
                  </div>
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?php echo $arsip->judul; ?>">
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan"><?php echo $arsip->keterangan; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori">
                        <option value="Surat" <?php if($arsip->kategori == 'Surat'){ echo 'selected'; } ?>>Surat</option>
                        <option value="Arsip Lainnya" <?php if($arsip->kategori == 'Arsip Lainnya'){ echo 'selected'; } ?>>Arsip Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Lampiran</label>
                    <br>
                    <input type="file" name="file">
                  </div>
                  <?php  
                    $path = 'uploads/'.$arsip->file;

                    if (file_exists($path)) {
                      echo '<a href="'.base_url().'uploads/'.$arsip->file.'" target="_blank">'.$arsip->file.'</a><br><br>';
                    }
                  ?>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>