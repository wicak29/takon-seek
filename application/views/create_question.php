`<!DOCTYPE html>
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

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
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
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Art<span class="pull-right">(1)</span></a></li>
                                <li><a href="#">Tech<span class="pull-right">(8)</span></a></li>
                                <li><a href="#">Networking<span class="pull-right">(4)</span></a></li>
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
