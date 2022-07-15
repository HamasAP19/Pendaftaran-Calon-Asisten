<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container content">
    <?php session()->getFlashdata('error'); ?>
    <form class="form-login" action="<?= base_url('/tambah'); ?>" method="post">
        <?= csrf_field(); ?>
        <p class="judul-form">FORM PENDAFTARAN CALON ASISTEN PRAKTIKUM</p>
        <div class="mb-3">
            <input type="text" class="form-control <?= ($validation->hasError('namaLengkap')) ? 'is-invalid' : ((old('namaLengkap') != null) ? 'is-valid' : ''); ?>" value="<?= old('namaLengkap'); ?>" id="inputnamaLengkap" placeholder="Nama Lengkap" name="namaLengkap">
            <div id="validationServerFeedback" class="invalid-feedback"><?= $validation->getError('namaLengkap'); ?></div>
            <div class="valid-feedback">Inputan anda sudah sesuai</div>
        </div>
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
        <div class="mb-3">
            <input type="number" name="angkatan" class="form-control <?= ($validation->hasError('angkatan')) ? 'is-invalid' : ((old('angkatan') != null) ? 'is-valid' : ''); ?>" value="<?= old('angkatan'); ?>" id="angkatan" placeholder="Angkatan" style="width: 100px;" min="2015" max="2021">
            <div id="validationServerFeedback" class="invalid-feedback"><?= $validation->getError('angkatan'); ?></div>
            <div class="valid-feedback">Inputan anda sudah sesuai</div>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="jenisKelamin" id="" style="width: 200px;border-radius: 10px;font-size: 14px;color: #6c757d" required>
                <option selected value="">Pilih Jenis Kelamin</option>;
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-masuk btn-primary">DAFTAR</button>
        <p>Sudah punya akun? <a href="/">Login</a></p>
    </form>
</div>
<?= $this->endSection(''); ?>