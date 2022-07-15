<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container content">
    <?php session()->getFlashdata('error'); ?>
    <?php if (session()->getFlashdata('gagalLogin')) : ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert" style="height: 40px;">
            <div>
                Email atau Password salah!!
            </div>
        </div>
    <?php endif; ?>
    <form class="form-login" action="<?= base_url('/login/masuk'); ?>" method="post">
        <?= csrf_field(); ?>
        <p class="judul-form">FORM LOGIN CALON ASISTEN PRAKTIKUM</p>
        <div class="mb-3">
            <input type="email" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ((old('username') != null) ? 'is-valid' : ''); ?>" value="<?= old('username'); ?>" id="inputUsername" placeholder="Email UAD" name="username">
            <div id="validationServerFeedback" class="invalid-feedback"><?= $validation->getError('username'); ?></div>
            <div class="valid-feedback">Inputan anda sudah sesuai</div>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ((old('password') != null) ? 'is-valid' : ''); ?>" value="<?= old('password'); ?>" id="password" placeholder="Kata Sandi">
            <div id="validationServerFeedback" class="invalid-feedback"><?= $validation->getError('password'); ?></div>
            <div class="valid-feedback">Inputan anda sudah sesuai</div>
        </div>
        <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Ingatkan Saya!</label>
        </div>
        <button type="submit" class="btn btn-masuk btn-primary">MASUK</button>
        <p>Belum punya akun? <a href="/daftar">Daftar</a></p>
        <p>Lupa kata sandi? Silahkan <a>Klik Disini</a></p>
    </form>
</div>
<?= $this->endSection(''); ?>