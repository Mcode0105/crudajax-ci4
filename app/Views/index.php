<?= $this->extend('layout/template'); ?>

<?= $this->section('conten'); ?>
<div class="container">
	<div class="row">
		<div class="col">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Navbar</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="/beranda">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/tentang">Tentang</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/kontak">Kontak</a>
							</li>
						</ul>
						<form class="d-flex">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success" type="submit">Search</button>
						</form>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 my-4">
			<h1 class="text-center">Leraning Crud Ajax COdeigniter 4</h1>
		</div>
		<div class="row">
			<div class="col">
				<div id="alert"></div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Jquet Ajax Crud - Student Data</h4>
					<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal"> Tambah data</button>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-md-8 mt-3 ml-2">
							<div class="input-group mb-3">
								<input id="keyword" type="text" class="form-control" placeholder="Innput Keyword" aria-label="Example text with button addon" aria-describedby="button-addon1">
							</div>
						</div>
					</div>
					<div id="fr" class="row mb-2">
						<form action="/Home/edit" method="POST">
							<div class="row">
								<div class="col-md-2">
									<input type="text" class="form-control" id="nama" placeholder="Nama" aria-label="Nama">
									<input type="hidden" id="id" name="id">
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" id="nisn" placeholder="Nisn" aria-label="Nisn">
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" id="alamat" placeholder="Alamat" aria-label="Alamat">
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" id="nohp" placeholder="No hp" aria-label="No hp">
								</div>
								<div class="col-md-4">
									<button id="editsd" type="button" class="btn btn-primary">Edit</button> |
									<button id="batal" type="button" class="btn btn-danger">Batal</button>
								</div>
							</div>
						</form>
					</div>
					<div class="loading"></div>
					<div class="tabelmurid">
						<table id="draf" class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Nisn</th>
									<th>Alamat</th>
									<th>No hp</th>
									<th>date Cretaed</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="murid">
								<div class="col-md-5">
									<div id="load"></div>
									<div style="display: none;" id="list" class="card">
										<div class="card-body">
											<ul class="list-group">
												<li class="list-group-item">Nama : <span class="badge bg-primary nama" id="nama"></span></li>
												<li class="list-group-item">nisn : <span class="badge bg-primary nisn" id="nisn"></span></li>
												<li class="list-group-item">alamat : <span class="badge bg-primary alamat" id="alamat"></span></li>
												<li class="list-group-item">nohp : <span class="badge bg-primary nohp" id="nohp"></span></li>
												<li class="list-group-item">created at : <span class="badge bg-primary createdat" id="created at"></span></li>
												<button id="close" class="btn btn-primary"><span class="badge bg-danger  id=" closet">tutup</span></button>
											</ul>
										</div>
									</div>
								</div>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah siswa</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="/Home/addajax" method="POST" id="formadd">
					<div class="form-group">
						<label for="nama">Nama</label> <span class="text-danger ms-3" id="error"></span>
						<input type="text" class="form-control" placeholder="nama siswa" id="nama" name="nama" autofocus>
					</div>
					<div class="form-group">
						<label for="nisn">Nisn</label> <span class="text-danger ms-3" id="error_nisn"></span>
						<input type="text" class="form-control" placeholder="Nisn siswa" id="nisn" name="nisn" autofocus>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label> <span class="text-danger ms-3" id="error_alamat"></span>
						<input type="text" class="form-control" placeholder="alamat siswa" id="alamat" name="alamay" autofocus>
					</div>
					<div class="form-group">
						<label for="nohp">No Hp</label> <span class="text-danger ms-3" id="error_nohp"></span>
						<input type="text" class="form-control" placeholder="No hp" id="nohp" name="nohp" autofocus>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary ajaxsave">Save </button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- model view -->
<div class="modal fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data <p class="ss"></p>
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="card">
					<ul class="list-group">
						<li class="list-group-item">Nama : <span class="badge bg-primary nama" id="nama"></span></li>
						<li class="list-group-item">nisn : <span class="badge bg-primary nisn" id="nisn"></span></li>
						<li class="list-group-item">alamat : <span class="badge bg-primary alamat" id="alamat"></span></li>
						<li class="list-group-item">nohp : <span class="badge bg-primary nohp" id="nohp"></span></li>
						<li class="list-group-item">created at : <span class="badge bg-primary createdat" id="created at"></span></li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>