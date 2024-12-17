<div class="card-body">
    <div id="menghilang">
        <?= $this->session->flashdata('notif'); ?>
    </div>
    <h4 class="card-title text-center">Formulir Pengaturan Website</h4>
    <div class="form">
        <form action="<?= base_url('konfigurasi/update'); ?>" method="POST" enctype="multipart/form-data" id="kategoriForm">
            <div class="form-group">
                <label for="judul_website">Judul Website:</label>
                <input type="text" class="form-control" id="judul_website" name="judul_website" required value="<?= $konfig->judul_website; ?>">
            </div>
            <div class="form-group">
                <label for="profil_website">Profil:</label>
                <textarea name="profil_website" class="form-control" id="profil_website" style="height: 150px;" required><?= $konfig->profil_webiste; ?></textarea>
            </div>
            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $konfig->instagram; ?>">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $konfig->facebook; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $konfig->email; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $konfig->alamat; ?>">
            </div>
            <div class="form-group">
                <label for="no_wa">WhatsApp:</label>
                <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?= $konfig->no_wa; ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
