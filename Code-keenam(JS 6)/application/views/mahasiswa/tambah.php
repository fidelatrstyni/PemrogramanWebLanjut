<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Form Tambah Data Mahasiswa</div>
                <div class="card-body">
                <?php
                        if (validation_errors()) {
                            echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="number" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan" class="form-group">
                            <?php foreach($jurusan as $key): ?>
                                <option 
                                value="<?= $key ?>"
                                selected><?= $key ?>
                                </option>
                            <?php endforeach; ?>
                                <!-- <option selected>Pilih Jurusan</option>
                                <option value="kimia">Kimia</option>
                                <option value="informatika">Informatika</option>
                                <option value="mesin">Mesin</option> -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
        </div>
    </div>
</div>