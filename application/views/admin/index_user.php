<div class="card-body">
    <div id="menghilang">
        <?= $this->session->flashdata('notif'); ?>
    </div>
    <h4 class="card-title text-center">Data User</h4>
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-success btn-sm" href="<?= base_url('user/tambah'); ?>">
            <i class="mdi mdi-account-plus"></i> Tambah User
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($user as $a) { ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= htmlspecialchars($a['username']); ?></td>
                    <td><?= htmlspecialchars($a['nama']); ?></td>
                    <td><?= htmlspecialchars($a['level']); ?></td>
                    <td class="text-center">
                        <a class="btn btn-outline-danger btn-sm" onClick="return confirm('Apakah anda yakin menghapus data ini?')"
                            href="<?= base_url('user/hapus/' . $a['id_user']); ?>">
                            <i class="icon-trash"></i> Hapus
                        </a>
                        <a class="btn btn-outline-primary btn-sm" href="<?= base_url('user/edit/' . $a['id_user']); ?>">
                            <i class="mdi mdi-border-color"></i> Edit
                        </a>
                    </td>
                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>
