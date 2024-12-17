
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="fw-bold">Tambah Carousel</h5>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('caraousel/simpan'); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label fw-semibold">Unggah Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.jpeg,.png" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row g-4">
        <?php foreach ($caraousel as $item) : ?>
            <div class="col-md-12 mb-3 mt-3">
                <div class="card h-100 shadow-sm border-0">
                    <!-- Gambar dari database -->
                    <img src="<?= base_url('upload/caraousel/' . $item['foto']); ?>" class="card-img-top" alt="<?= htmlspecialchars($item['judul'], ENT_QUOTES, 'UTF-8'); ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold"><?= htmlspecialchars($item['judul'], ENT_QUOTES, 'UTF-8'); ?></h5>
                       
                        <!-- Form untuk upload foto baru -->
                        <form action="<?= site_url('caraousel/update/' . $item['id_caraousel']); ?>" method="post" enctype="multipart/form-data">
                        </form>

                        <!-- Link untuk melihat detail -->
                        <a class="btn btn-outline-danger btn-sm" onClick="return confirm('Apakah anda yakin menghapus data ini?')" href="<?= base_url('caraousel/hapus/' . $item['id_caraousel']); ?>">
                            <i class="icon-trash"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
