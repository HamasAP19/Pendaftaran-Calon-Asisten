<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container content">
    <?php session()->getFlashdata('error'); ?>

    <form class="form-login" action="<?= base_url('/login/masuk'); ?>" method="post">
        <?= csrf_field(); ?>
        <p class="judul-form">FORM LOGIN CALON ASISTEN PRAKTIKUM</p>
        <div class="mb-3">
            <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ((old('email') != null) ? 'is-valid' : ''); ?>" value="<?= old('email'); ?>" id="inputemail" placeholder="Email UAD" name="email">
            <div id="validationServerFeedback" class="invalid-feedback"><?= $validation->getError('email'); ?></div>
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
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert <?= session()->getFlashdata('class'); ?>" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-masuk btn-primary">MASUK</button>
        <p>Belum punya akun? <a href="/daftar">Daftar</a></p>
        <p>Lupa kata sandi? Silahkan <a>Klik Disini</a></p>
    </form>
</div>
<?= $this->endSection(''); ?>