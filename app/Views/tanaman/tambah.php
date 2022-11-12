<?= $this->extend('layout/default')?>

<?= $this->section('title')?>
<title>Tambah Data Tanaman</title>
<?= $this->endSection()?>

<?= $this->section('content')?> 

    <section class="section">
      <div class="section-header">
        <div class="section-header-button">
          <!-- arahkan ke tambah.php -->
          <a href="<?=site_url('tanaman')?>" class="btn btn-primary">Kembali</a>
        </div>
        <h1> Tambah Data</h1>
      </div>

      <div class="section-body">
        <div class="card">
          <div class="card-header">
            Data UPlant / Tanaman
          </div>

          <div class="card-body col-md-6">
          	<form action="<?=site_url('tanaman')?>" method="post" autocomplete="off">
          		<!-- buat security -->
          		<?= csrf_field() ?>
          		<div class="form-group">
          			<label>Nama Tanaman</label>
          			<input type="text" name="nama_tanaman" class="form-control" required autofocus="">
          		</div>
				<div class="form-group" data-select2-id="7">
                	<label>Jenis</label>
                    <select class="form-control" name="jenis" tabindex="-1" aria-hidden="true">
                    	<option selected disabled>Pilih Jenis</option>
                    	<option>Tanaman Hias</option>
                        <option>Tanaman Obat</option>
                        <option>Tanaman Hidroponik</option>
                        <option>Tanaman Buah</option>
                        <option>Tanaman Sayur</option>
                    </select>
                </div>
          		<div class="form-group">
          			<label>Nama Ilmiah</label>
          			<input type="text" name="nama_ilmiah" class="form-control" required autofocus="">
          		</div>
          		<div>
          			<button type="submit" class="btn btn-success">Submit</button>		
          			<button type="reset" class="btn btn-danger">Reset</button>		
          		</div>
          	</form>
          </div>
        </div>
      </div>
    </section>

<?= $this->endSection()?>