<div class="">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Transaksi</h4>
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
							<th>Aksi</th>
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
              <a href=""></a>
						</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>
