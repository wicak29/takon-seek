     <?php $kategori=array('', 'Games', 'Technology', 'Networking'); ?>
     <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h1 class="title">Home</h1>
                            <p>Ask before you get lost</p>
                        </div>                                                                                
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                <a href="<?php echo base_url('home/create_question'); ?>" class="btn btn-common" style="margin-top: 20px;">ASK NEW QUESTION!</a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <?php
                        if (isset($all_question))
                        {
                            foreach ($all_question as $key => $q) { ?>
                            <div class="col-sm-12 col-md-12">
                                <div class="single-blog single-column">
                                    <div class="post-content overflow">
                                        <h2 class="post-title bold"><a href="<?php echo base_url('home/question_detail/'.$q['id']); ?>"><?php echo $q['title']; ?></a></h2>
                                        <h3 class="post-author"><a href="#">Posted by <?php echo "wicak" ?></a></h3>
                                        <div class="post-bottom overflow">
                                            <ul class="nav navbar-nav post-nav">
                                                <li><a href="#"><i class="fa fa-tag"></i><?php echo $kategori[$q['category']]; ?></a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i><?php echo $q['total_answer']; ?> Answer</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
                        }

                        ?>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <li class="<?php if($id_kategori==1) echo "active"; ?>"><a href="<?php echo base_url('home/category/1'); ?>">Games</a></li>
                                <li class="<?php if($id_kategori==2) echo "active"; ?>"><a href="<?php echo base_url('home/category/2'); ?>">Technology</a></li>
                                <li class="<?php if($id_kategori==3) echo "active"; ?>"><a href="<?php echo base_url('home/category/3'); ?>">Networking</a></li>
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
