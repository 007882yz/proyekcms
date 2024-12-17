<?php foreach($user as $a){?>
<div class=" stretch-card" style="width: 950px">	
	<div class="card">
	<div id="menghilang">
			<?= $this->session->flashdata('notif'); ?>
		</div>
		<div class="card-body">
			<h4 class="card-title">Edit user</h4>
			<form action="<?= base_url('user/update')?>" method="post">
				<div class="form-group">
					<label for="exampleInputUsername1">Username:</label>
					<input type="text" name="username" class="form-control" 
						placeholder="Username" value="<?= $a['username']?>"  required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama:</label>
					<input type="text" name="nama" class="form-control"  placeholder="Nama" value="<?= $a['nama']?>"  readonly required>
				</div>
                <input type="hidden" name="id_user" readonly  value="<?= $a['id_user']?>" >
				<button type="submit" class="btn btn-primary mr-2">Update</button>
				<button class="btn btn-light">Cancel</button>
			</form>
		</div>
	</div>
</div>
<?php } ?>
