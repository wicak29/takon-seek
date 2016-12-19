     <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h1 class="title">Create Question</h1>
                            <p>You can ask anyone about your confusion</p>
                        </div>                                                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog" class="padding-top" style="margin-bottom: 80px; ">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <form method="POST" action="<?php echo base_url('home/create_new_question'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Question Name *</label>
                            <input type="text" name="q_name" class="form-control" required="required" placeholder="Question Name">
                        </div>
                        <div class="form-group">
                            <label>Question Text *</label>
                            <textarea name="q_text" class="form-control" required="required" placeholder="Question Text" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category *</label>
                            <select name="kategori" class="form-control" required="required">
                                <option value="1">Games</option>
                                <option value="2">Technology</option>
                                <option value="3">Networking</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Upload Video</label>
                            <input id="video_upload" type="file" name="video_upload" class="form-control">
                        </div>
                        <hr>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Submit" style="width: auto; ">
                        </div>
                    </form>
                 </div>
                <div class="col-md-3 col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <li class=""><a href="<?php echo base_url('home/category/1'); ?>">Games</a></li>
                                <li class=""><a href="<?php echo base_url('home/category/2'); ?>">Technology</a></li>
                                <li class=""><a href="<?php echo base_url('home/category/3'); ?>">Networking</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->

    <script type="text/javascript" src="<?php echo base_url('assets/multicolor'); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/multicolor'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/multicolor'); ?>/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/multicolor'); ?>/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/multicolor'); ?>/js/main.js"></script>   
</body>
</html>
