<?php $kategori=array('', 'Games', 'Technology', 'Networking'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Takon Seek</title>
    <link href="<?php echo base_url('assets/multicolor'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/multicolor'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/multicolor'); ?>/css/lightbox.css" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/multicolor'); ?>/css/animate.min.css" rel="stylesheet"> 
	<link href="<?php echo base_url('assets/multicolor'); ?>/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/multicolor'); ?>/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url('assets/multicolor'); ?>/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/multicolor'); ?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/multicolor'); ?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/multicolor'); ?>/mages/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/multicolor'); ?>/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "7e8eb33b-fbe0-4915-9b93-09490e3d10df", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head><!--/head-->

<body>
	<header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <a href="">www.takon-seek.com</a>
                    </div> 
                </div>
             </div>
        </div>
    </header>
    <!--/#header-->

     <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Questions List</h1>
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
                            
                            foreach ($question_list as $key => $value) {
                            ?>
                            <div class="col-sm-12 col-md-12">
                                <div class="single-blog single-column">
                                    <div class="post-content overflow">
                                        <h2 class="post-title bold"><a href="<?php echo base_url('home/question_detail/'.$value['id']); ?>"><?php echo $value['title']; ?></a></h2>
                                        <h3 class="post-author"><a href="#">Posted by Melody</a></h3>
                                        <div class="post-bottom overflow">
                                            <ul class="nav navbar-nav post-nav">
                                                <li><a href="#"><i class="fa fa-tag"></i><?php echo $kategori[$value['category']]; ?></a></li>
                                                <!-- <li><a href="#"><i class="fa fa-comments"></i>0 Answer</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        ?>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
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
