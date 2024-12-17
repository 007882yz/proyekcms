<div id="menghilang">
	<?= $this->session->flashdata('notif'); ?>
</div>
<div>

</div>
<div class="form-group" style="width: 1200px;">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Tambah user</h4>
			<form action="<?= base_url('user/simpan')?>" method="post">
				<div class="form-group">
					<label for="exampleInputName1">Name:</label>
					<input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Name" />
				</div>
				<div class="form-group">
					<label for="exampleInputEmail3">Username:</label>
					<input type="text" name="username" class="form-control" id="exampleInputEmail3"
						placeholder="Email" />
				</div>
				<div class="form-group">
					<label for="exampleInputPassword4">Password:</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword4"
						placeholder="Password" />
				</div>
				<div class="form-group">
					<label for="exampleSelectGender">Level:</label>
					<select name="level" class="form-control" required>
						<option value="Kontributor">Kontributor</option>
						<option value="Admin">Admin</option>
					</select>
				</div>
				<!-- Alamat -->
				<div class="form-group">
					<label for="alamat">Alamat:<span>*</span></label>
					<input name="alamat" type="text" class="form-control" id="alamat"
						value="<?= htmlspecialchars($this->session->userdata('alamat')) ?>" required>
				</div>

				<!-- No Telephone -->
				<div class="form-group">
					<label for="no_telp">No Telephone:<span>*</span></label>
					<input name="no_telp" type="number" class="form-control" id="no_telp" min="0"
						value="<?= htmlspecialchars($this->session->userdata('no_telp')) ?>" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<button type="button" class="btn btn-light btn-block">Cancel</button>
			</form>
		</div>
	</div>
</div>
