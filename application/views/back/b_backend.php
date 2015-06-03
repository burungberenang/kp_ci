
        <div id="content">
            <div id="content-header">
                <h1>Dashboard</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="current">Dashboard</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Selamat Datang <?php echo $this->session->userdata('name'); ?></h3>
                        <?php if($this->session->userdata('role')==1):?>
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"><i class="glyphicon glyphicon-signal"></i></span><h5>Site Statistics</h5></div>
                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <ul class="site-stats">
                                            <li><div class="cc"><i class="glyphicon glyphicon-user"></i> <strong><?php echo $jumlahuser; ?></strong> <small>Total member</small></div></li>
                                            <li><div class="cc"><i class="glyphicon glyphicon-arrow-right"></i> <strong><?php echo $jumlahmateri; ?></strong> <small>Total materi</small></div></li>
                                            <li><div class="cc"><strong>Rp.</strong><strong><?php echo number_format($jumlahpendapatan); ?></strong> <small>Total pendapatan</small></div></li>
                                            <li><div class="cc"><strong>Rp.</strong><strong><?php echo number_format($jumlahpendapatanperbulan); ?></strong> <small>Total pendapatan bulan lalu</small></div></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-8">
                                            <div class="chart"></div>
                                    </div>	
                                </div>		
                            </div>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        