        
            <!--Footer-->
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 footer">
                    <div class="col-md-3 col-md-offset-1">
                        <h3 class="footer-caption">Judul</h3>
                        <span></span>
                        <span>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </span>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h3 class="footer-caption">About Us</h3>
                        <span>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </span>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h3 class="footer-caption">Contact Information</h3>
                        <span>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </body>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(window).scroll(function(){
                var scrollTop = $(window).scrollTop();
                if(scrollTop != 0)
                    $('.navigasi').stop().animate({'opacity':'0.7'},100);
                else    
                    $('.navigasi').stop().animate({'opacity':'1'},100);
            });
            
            $('.navigasi').hover(
                function (e) {
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop != 0){
                        $('.navigasi').stop().animate({'opacity':'1'},100);
                    }
                },
                function (e) {
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop != 0){
                        $('.navigasi').stop().animate({'opacity':'0.7'},100);
                    }
                }
            );
        });
    </script>
</html>