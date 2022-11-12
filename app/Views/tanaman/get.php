<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Tanaman</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
  <div class="section-header">
    <h1>UPlant</h1>
    <div class="section-header-button">
      <!-- arahkan ke tambah.php -->
      <a href="<?= site_url('tanaman/tambah') ?>" class="btn btn-primary">Tambah Data</a>
    </div>
  </div>

  <!-- ini buat alert -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show.fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Success!</b>
        <?= session()->getFlashdata('success') ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible show.fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>There is something error!</b>
        <?= session()->getFlashdata('error') ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        Data UPlant / Tanaman
        <hr>

        <div class="dropdown d-inline" style="justify-content: right;">  
        <button class="btn btn-primary dropdown-toggle" type="button" id="exportfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Export File
        </button>
        <div class="dropdown-menu">
          <a href="<?=site_url('tanaman/exportexc');?>" class="dropdown-item has-icon" style="width: 100%;"  target="_blank">
            <i class="fas fa-file-excel"></i> Export Excel
          </a>
          <a href="<?=site_url('tanaman/exportpdf');?>" class="dropdown-item has-icon" style="width: 100%;" target="_blank">
            <i class="fas fa-file-pdf"></i> Export PDF
          </a>
        </div>    

        <div class="dropdown d-inline">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton4" id="modal-importexc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Import File
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a  class="dropdown-item has-icon" href="<?=base_url('template.xlsx')?>"><i class="fas fa-file-download"></i>Download Template</a>
              <a  class="dropdown-item has-icon" href="<?=site_url('tanaman/import');?>" data-toggle="modal" data-target="#modal-impexc"><i class="fas fa-file-import"></i>Import Excel</a>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-striped table-md" id="datatab">
          </thead>
            <tr>
              <th>No.</th>
              <th>Nama Tanaman</th>
              <th>Jenis</th>
              <th>Nama Ilmiah</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($uplant as $key => $value) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->nama_tanaman ?></td>
                <td><?= $value->jenis ?></td>
                <td><?= $value->nama_ilmiah ?></td>
                <td class="text-center" style="width: 15%;">
                  <!-- edit arahkan ke id -->
                  <a href="<?= site_url('tanaman/edit/' . $value->id_tanaman); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                  <form action="<?=site_url('tanaman/'.$value->id_tanaman)?>" method="post" class="d-inline">
                    <?= csrf_field()?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button href="" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-impexc">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Import Data Tanaman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?=site_url('tanaman/import')?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <label>File Excel (format .xlsx atau .xls)</label>
              <div class="custom-file">
                <?= csrf_field()?>
                <input type="file" name="impexc" class="custom-file-input" id="impexc" required>
                <label for="impexc" class="custom-file-label">Pilih File</label>
              </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>