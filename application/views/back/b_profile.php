            <div id="content">
            <div id="content-header">
                <h1>Profile</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/guidance/home" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="current">Profile</a>
            </div>
            <br/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php if ($this->session->flashdata('warning'))
                            {  echo $this->session->flashdata('warning'); }?>
                        <div class="col-md-2">
                            <img width="100%" src="<?php echo base_url(); ?>foto/<?php echo $user['foto'] ?>" /><br/>
                            <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open_multipart("guidance/profile",$attributes); ?>
                                <input type="file" class="input-sm" name="foto" required/>
                                <input type="submit" class="btn btn-block btn-primary" name="ganti" value="Ganti Foto"/>
                            </form>
                        </div>
                        <div class="col-md-10">
                            <style>
                                .kolom-kiri{
                                    text-align: right;
                                    width: 20%
                                }
                            </style>
                            <table class="table table-striped">
                                <tr>
                                    <td class="kolom-kiri"><label>Nama :</label></td>
                                    <td><?php echo $user['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td class="kolom-kiri"><label>No KTP :</label></td>
                                    <td><?php echo $user['noKTP'] ?></td>
                                </tr>
                                <tr>
                                    <td class="kolom-kiri"><label>Alamat :</label></td>
                                    <td><?php echo $user['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td class="kolom-kiri"><label>Tanggal Lahir :</label></td>
                                    <td><?php echo $user['tglLahir'] ?></td>
                                </tr>
                                <tr>
                                    <td class="kolom-kiri"><label>Jabatan :</label></td>
                                    <td><?php echo $user['jabatan'] ?></td>
                                </tr>
                            </table>
                            <a class="btn btn-primary" href="<?php echo site_url(); ?>/guidance/profile/edit">Edit Profile</a>
                            <a class="btn btn-primary" href="<?php echo site_url(); ?>/guidance/profile/password">Ganti Password</a>
                        </div>
                    </div>
                </div>
            </div>