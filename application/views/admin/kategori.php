
<div class="card-body">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h4 class="card-title">Daftar Kategori</h4>
		<!-- Tombol Tambah Kategori -->
		<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahKategoriModal">
			+ Tambah Kategori
		</button>
	</div>

	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead class="thead-light">
				<tr>
					<th>No</th>
					<th>Nama Kategori Konten</th>
					<th>Foto</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($kategori as $k) { ?>
				<tr>
					<th scope="row"><?= $no; ?></th>
					<td><?= htmlspecialchars($k['nama_kategori']); ?></td>
					<td>
						<?php if (!empty($k['foto'])): ?>
						<img src="<?= base_url('upload/konten/' . $k['foto']); ?>" alt="Foto" class="img-thumbnail"
							width="300">
						<?php else: ?>
						<span class="text-muted">Tidak ada foto</span>
						<?php endif; ?>
					</td>
					<td class="text-center">
						<a class="btn btn-outline-danger btn-sm"
							onClick="return confirm('Apakah anda yakin menghapus data ini?')"
							href="<?= base_url('kategori/hapus/' . $k['id_kategori']); ?>">
							<i class="icon-trash"></i> Hapus
						</a>
						<a class="btn btn-outline-primary btn-sm" data-toggle="modal"
							data-target="#editKategoriModal<?= $k['id_kategori']; ?>">
							<i class="mdi mdi-border-color"></i> Edit
						</a>

					</td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Form untuk tambah kategori -->
			<form action="<?= base_url('kategori/simpan'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<!-- Input Nama Kategori -->
					<div class="form-group">
						<label for="namaKategori">Nama Kategori</label>
						<input type="text" class="form-control" id="namaKategori" name="nama_kategori" required>
					</div>
					<!-- Input Foto -->
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto" class="form-control" id="foto" accept="image/png, image/jpeg"
							required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal Edit Kategori -->
<?php foreach ($kategori as $k) { ?>
<div class="modal fade" id="editKategoriModal<?= $k['id_kategori']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="editKategoriModalLabel<?= $k['id_kategori']; ?>" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editKategoriModalLabel<?= $k['id_kategori']; ?>">Edit Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('kategori/update'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<!-- Hidden Input for ID -->
					<input type="hidden" name="id_kategori" value="<?= $k['id_kategori']; ?>">

					<div class="form-group">
						<label for="namaKategori<?= $k['id_kategori']; ?>">Nama Kategori</label>
						<input type="text" class="form-control" id="namaKategori<?= $k['id_kategori']; ?>"
							value="<?= htmlspecialchars($k['nama_kategori']); ?>" name="nama_kategori" required>
					</div>

					<div class="form-group">
						<label for="foto<?= $k['id_kategori']; ?>">Foto</label>
						<?php if (!empty($k['foto'])): ?>
						<div class="mb-2">
							<img src="<?= base_url('upload/konten/' . $k['foto']); ?>" alt="Foto Lama"
								class="img-thumbnail" width="150">
							<p class="text-muted">Foto saat ini</p>
						</div>
						<?php endif; ?>
						<input type="file" name="foto" class="form-control" id="foto<?= $k['id_kategori']; ?>"
							accept="image/png, image/jpeg">
						<small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
