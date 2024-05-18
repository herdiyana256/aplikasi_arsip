<?= $this->extend('layouts/page_layouts') ?>

<?= $this->section('content') ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?php echo $title; ?></h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } ?>

        <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-danger">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php } ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.Surat</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Created By</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arsip->getResult() as $val){ ?>
                        <tr>
                            <td><?php echo $val->no_surat; ?></td>
                            <td><?php echo $val->judul; ?></td>
                            <td><?php echo $val->keterangan; ?></td>
                            <td><?php echo $val->kategori; ?></td>
                            <td><?php echo $val->created_by; ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="<?php echo base_url() ?>uploads/<?php echo $val->file; ?>" target="_blank" class="btn btn-success">Download</a>
                                    <a href="<?php echo base_url() ?>arsip/edit/<?php echo $val->id; ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url() ?>arsip/delete/<?php echo $val->id; ?>" class="btn btn-danger" onclick="return confirm('Arsip akan dihapus?')">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.Surat</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Created By</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?php echo base_url(); ?>arsip/create" class="btn btn-primary">Tambah</a>
    </div>
</div>
<?= $this->endSection() ?>