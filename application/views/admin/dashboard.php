<div class="">
	<h3 class="font-weight-bold">Welcome <?= $this->session->userdata('nama'); ?></h3>
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Riwayat</h4>
			</p>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th>Nama</th>
							<th>Alamat</th>
							<th>No. Telepon</th>
							<th>Jumlah</th>
							<th>Sub Total</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($checkout as $item) { ?>
						<tr>
							<td><?= htmlspecialchars($item['nama']) ?></td>
							<td><?= htmlspecialchars($item['alamat']) ?></td>
							<td><?= htmlspecialchars($item['no_telp']) ?></td>
							<td><?= htmlspecialchars($item['jumlah']) ?></td>
							<td>Rp.<?= number_format($item['sub_total'], 2) ?></td>
							<td>
								<label class="badge badge-danger"><?= $item['status'] ?></label>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>
