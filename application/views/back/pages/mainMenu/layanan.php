<div class="main-content container-fluid">
	<div class="page-title">
		<div class="row">
			<?= $this->session->flashdata('status');  ?>
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Layanan</h3>
				<p class="text-subtitle text-muted">Layanan ini berisi berbagai jenis layanan yang kami sediakan.</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class='breadcrumb-header'>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Layanan</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<section class="section">
		<div class="card">
			<div class="card-header">
				<button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-backdrop="false" data-target="#backdrop">Tambah Data</button>
			</div>
			<div class="card-body">
				<table class='table table-striped' id="table1">
					<thead>
						<tr>
							<th>Layanan</th>
							<th>Foto</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($index as $indexs) : ?>
							<tr>
								<td><?= $indexs['jenis']; ?></td>
								<td>
									<img src="<?= base_url('public/image/layanan/') . $indexs['foto']; ?>" alt="layanan" width="70px">
								</td>
								<td>
									<a href="http://" class="btn btn-success" data-toggle="modal" data-backdrop="false" data-target="#updateLayanan<?= $indexs['id']; ?>"> <i data-feather="edit" width="5"></i></a>
									<a href="http://" class="btn btn-danger"> <i data-feather="eye" width="5"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

<!-- Modal store data layanan -->
<div class="col-md-6 col-12">
	<div class="modal fade text-left modal-borderles" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h4 class="modal-title" id="myModalLabel4">Tambah Data Layanan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Admin/Layanan/store') ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col col-lg-12 col-md-6">

								<div class="form-group">
									<label for="jenis">Jenis Layanan</label>
									<input type="text" name="jenis" class="form-control" id="jenis" placeholder="Jenis Layanan">
								</div>

								<div class="form-group">
									<label for="foto">Foto</label>
									<input type="file" name="foto" id="foto" class="form-control">
									<!-- <p><small class="text-muted">Find helper text here for given textbox.</small></p> -->
								</div>

								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea name="deskripsi" id="snow" cols="10" rows="7" class="form-control"></textarea>
								</div>
							</div>
							<div class="modal-footer mt-3">
								<button type="reset" class="btn btn-light-secondary" data-dismiss="modal">
									<i class="bx bx-x d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Close</span>
								</button>
								<button type="submit" class="btn btn-primary ml-1">
									<i class="bx bx-check d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Save</span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Akhir modal store data layanan -->

<!-- Modal update data layanan -->
<?php foreach ($index as $indexs) : ?>
	<div class="col-md-6 col-12">
		<div class="modal fade text-left modal-borderles" id="updateLayanan<?= $indexs['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h4 class="modal-title" id="myModalLabel4">Update Data Layanan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('Admin/Layanan/update') ?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col col-lg-12 col-md-6">

									<div class="form-group">
										<label for="jenis">Jenis Layanan</label>
										<input type="text" name="jenis" class="form-control" id="jenis" value="<?= $indexs['jenis']; ?>">
									</div>

									<div class="form-group">
										<label for="foto">Foto</label>
										<input type="file" name="foto" id="foto" class="form-control">
										<!-- <p><small class="text-muted">Find helper text here for given textbox.</small></p> -->
									</div>

									<div class="form-group">
										<label for="deskripsi">Deskripsi</label>
										<textarea name="deskripsiUpdate" id="snow" cols="10" rows="7" class="form-control"></textarea>
									</div>
								</div>
								<div class="modal-footer mt-3">
									<button type="reset" class="btn btn-light-secondary" data-dismiss="modal">
										<i class="bx bx-x d-block d-sm-none"></i>
										<span class="d-none d-sm-block">Close</span>
									</button>
									<button type="submit" class="btn btn-success ml-1">
										<i class="bx bx-check d-block d-sm-none"></i>
										<span class="d-none d-sm-block">Save</span>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- Akhir modal store data layanan -->

<script>
	CKEDITOR.replace('deskripsi');
	CKEDITOR.replace('deskripsiUpdate');
</script>
