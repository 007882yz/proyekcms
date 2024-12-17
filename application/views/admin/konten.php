
<div class="card-body">
<div id="menghilang">
	<?= $this->session->flashdata('notif'); ?>
</div>
	<!-- Bagian Heading dan Tombol Tambah -->
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h4 class="card-title">Daftar Konten</h4>
		<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahKontenModal">
			+ Tambah Konten
		</button>
	</div>
	<!-- Tabel Daftar Konten -->
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead class="thead-light">
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Kategori</th>
					<th>Keterangan</th>
					<th>Foto</th>
					<th>Harga</th>
					<th>Stock</th>
					<th>Tanggal</th>
					<th>Username</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($konten as $k): ?>
				<tr>
					<th scope="row"><?= $no; ?></th>
					<td><?= htmlspecialchars($k['judul']); ?></td>
					<td><?= htmlspecialchars($k['nama_kategori']); ?></td>
					<td class="keterangan-column"><?= htmlspecialchars($k['keterangan']); ?></td>
					
					<td>
    <?php 
    $photos = json_decode($k['foto'], true); 
    if (!empty($photos)): ?>
        <img src="<?= base_url('./upload/konten/' . $photos[0]); ?>" alt="Foto" class="img-thumbnail" width="100">
    <?php else: ?>
        <span class="text-muted">Tidak ada foto</span>
    <?php endif; ?>
</td>


					<td><?= htmlspecialchars($k['harga']); ?></td>
					<td><?= htmlspecialchars($k['stock']); ?></td>
					<td><?= htmlspecialchars($k['tanggal']); ?></td>
					<td><?= htmlspecialchars($k['username']); ?></td>
					<td class="text-center">
						<!-- Tombol Hapus -->
						<a class="btn btn-outline-danger btn-sm"
							onClick="return confirm('Apakah anda yakin menghapus data ini?')"
							href="<?= base_url('konten/hapus/' . $k['id_konten']); ?>">
							<i class="icon-trash"></i> Hapus
						</a>
						<!-- Tombol Edit -->
						<a class="btn btn-outline-primary btn-sm" data-toggle="modal"
							data-target="#editKontenModal<?= $k['id_konten']; ?>">
							<i class="mdi mdi-border-color"></i> Edit
						</a>
					</td>
				</tr>
				<?php $no++; endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah Konten -->
<div class="modal fade" id="tambahKontenModal" tabindex="-1" role="dialog" aria-labelledby="tambahKontenModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahKontenModalLabel">Tambah Konten</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('konten/simpan'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" class="form-control" id="judul" name="judul" required>
					</div>
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" class="form-control" required>
							<option value="" disabled selected>Pilih Kategori</option> <!-- Placeholder option -->
							<?php foreach ($kategori as $kat): ?>
							<option value="<?= $kat['id_kategori']; ?>"><?= htmlspecialchars($kat['nama_kategori']); ?>
							</option>
							<?php endforeach; ?>
						</select>

					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea name="keterangan" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto[]" class="form-control" accept="image/png, image/jpeg" multiple>
					</div>

					<div class="form-group">
						<label for="harga">Harga</label>
						<textarea name="harga" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="stock">Stock:</label>
						<input type="number" id="stock" name="stock" class="form-control" min="0" required><br><br>
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

<!-- Modal Edit Konten -->
<?php foreach ($konten as $k): ?>
<div class="modal fade" id="editKontenModal<?= $k['id_konten']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="editKontenModalLabel<?= $k['id_konten']; ?>" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editKontenModalLabel<?= $k['id_konten']; ?>">Edit Konten</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('konten/update'); ?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id_konten" value="<?= $k['id_konten']; ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="judul<?= $k['id_konten']; ?>">Judul</label>
						<input type="text" class="form-control" id="judul<?= $k['id_konten']; ?>" name="judul"
							value="<?= htmlspecialchars($k['judul']); ?>" required>
					</div>
					<div class="form-group">
						<label for="kategori<?= $k['id_konten']; ?>">Kategori</label>
						<select name="kategori" class="form-control">
							<?php foreach ($kategori as $kat): ?>
							<option value="<?= $kat['id_kategori']; ?>"
								<?= $kat['id_kategori'] == $k['kategori'] ? 'selected' : ''; ?>>
								<?= htmlspecialchars($kat['nama_kategori']); ?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="keterangan<?= $k['id_konten']; ?>">Keterangan</label>
						<textarea name="keterangan" class="form-control"><?= htmlspecialchars($k['keterangan']); ?></textarea>
					</div>
					<div class="form-group">
						<label for="foto<?= $k['id_konten']; ?>">Foto</label>
						<input type="file" name="foto[]" class="form-control" accept="image/png, image/jpeg" multiple>
						<!-- Tampilkan Foto Lama -->
						<?php 
						$photos = json_decode($k['foto'], true);
						if (!empty($photos)):
							foreach ($photos as $photo): ?>
							<img src="<?= base_url('upload/konten/' . $photo); ?>" alt="Foto" class="img-thumbnail"
								width="100">
							<?php endforeach;
						endif; ?>
					</div>
					<div class="form-group">
						<label for="harga<?= $k['id_konten']; ?>">Harga</label>
						<input type="text" name="harga" class="form-control" value="<?= htmlspecialchars($k['harga']); ?>" required>
					</div>
					<div class="form-group">
						<label for="harga<?= $k['id_konten']; ?>">Srock</label>
						<input type="text" name="stock" class="form-control" value="<?= htmlspecialchars($k['stock']); ?>" required>
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
<?php endforeach; ?>
