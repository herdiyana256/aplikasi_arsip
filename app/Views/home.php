<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="jumbotron text-center" style="height: 500px">
    <img src="logo.png" style="height:100px">
    <h1 class="mt-5">APLIKASI ARSIP USM</h1>
    <a href="<?php echo base_url('login'); ?>" class="btn btn-outline-primary my-2">Login</a>
    <a href="<?php echo base_url('register'); ?>" class="btn btn-success my-2">Register</a>
</section>

<?= $this->endSection() ?>