<h2 class="mb-4">Tambah Anggota</h2>

<span id="success-message"></span>
<form action="<?= base_url('anggota/add') ?>" method="post" id="add_form">
	<div class="form-group row">
		<label for="no_employee" class="col-sm-2 col-form-label">No Karyawan</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="no_employee" id="no_employee">
			<small>No karyawan harus unik.</small>
			<span id="no_error" class="text-danger"></span>
		</div>
	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Nama</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="name" name="name">
			<span id="name_error" class="text-danger"></span>
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email">
			<span id="email_error" class="text-danger"></span>
		</div>
	</div>

	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="password" name="password">
			<span id="password_error" class="text-danger"></span>
		</div>
	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-6">
			<select name="gender" class="form-control">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="position" class="col-sm-2 col-form-label">Bagian</label>
		<div class="col-sm-6">
			<select name="position_id" class="form-control">
				<?php foreach ($position as $p) : ?>
					<option value="<?= $p['id_positions'] ?>"><?= $p['position_name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-8">
			<button type="submit" id="save" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>
</form>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		$('#add_form').on('submit', function(event) {
			event.preventDefault();
			$.ajax({
				url: "<?= base_url(); ?>addajax/loginajax",
				method: "POST",
				data: $(this).serialize(),
				dataType: 'json',
				beforeSend: function() {
					$('#save').attr('disabled', 'disabled');
				},
				success: function(data) {
					if (data.error) {
						if (data.no_error != '') {
							$('#no_error').html(data.no_error);
						} else {
							$('#no_error').html('');
						}
						if (data.name_error != '') {
							$('#name_error').html(data.name_error);
						} else {
							$('#name_error').html('');
						}
						if (data.email_error != '') {
							$('#email_error').html(data.email_error);
						} else {
							$('#email_error').html('');
						}
						if (data.password_error != '') {
							$('#password_error').html(data.password_error);
						} else {
							$('#password_error').html('');
						}
					}
					if (data.success) {
						$('#success-message').html(data.success);
						$('#no_error').html('');
						$('#name_error').html('');
						$('#email_error').html('');
						$('#password_error').html('');
						$('#add_form')[0].reset();
					}
					$('#save').attr('disabled', false);
				}
			})
		})
	})
</script>