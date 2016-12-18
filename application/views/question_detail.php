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
                            <h1 class="title">TAKON SEEK</h1>
                            <p>Ask First Before You Get Lost</p>
                        </div>                                                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog-details" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-content overflow">
                                    <div class="author-profile padding">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label></label>
                                                <img class="media-object" src="<?php echo base_url('assets/multicolor'); ?>/images/blogdetails/5.png" alt="" style="border-left: 0px;">
                                            </div>
                                            <div class="col-sm-10">
                                                <h2><?php echo $question_det['title']; ?></h2>
                                                <?php 
                                                    if(isset($question_det['video_id']))
                                                    { ?>
                                                        <video width="100%" controls>
                                                            <source src="<?php echo base_url('assets/video/'.$video_detail[0]['nama_video']); ?>" type="video/mp4">
                                                        </video>
                                                    <?php }   
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p><?php echo $question_det['text']; ?></p>
                                                    </div>
                                                </div>
                                                <!-- <span>Website:<a href="www.jooomshaper.com"> www.jooomshaper.com</a></span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="response-area">
                                        <h2 class="bold">Answers</h2>
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="post-comment">
                                                    <?php
                                                        if(sizeof($answer_list)==0)
                                                        { ?>
                                                            <h3>No Answer Yet</h3>
                                                        <?php }
                                                        else
                                                        { 
                                                            foreach ($answer_list as $key => $answer) 
                                                            { ?>
                                                                <a class="pull-left" href="#">
                                                                    <img class="media-object" src="<?php echo base_url('assets/multicolor'); ?>/images/blogdetails/5.png" alt="" style="border-left: 0px;">
                                                                </a>
                                                                <div class="media-body" style="padding-bottom: 30px;">
                                                                    <span><i class="fa fa-user"></i>Posted by <a href="#"><?php echo $answer['username'] ?></a></span> <span class="label label-success">Online</span>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <p style="font-size: 12pt; "><?php echo $answer['answer_text'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="nav navbar-nav post-nav">
                                                                        <li><small><a href="#"><i class="fa fa-clock-o"></i><?php echo $answer['answer_date_posted']; ?></a></small></li>
                                                                    </ul>
                                                                    <br>
                                                                    <br>
                                                                    <a href="<?php echo base_url('home/chat/'); ?>"><button class="btn btn-default btn-xs">Ask for Video Chat</button></a>
                                                                </div>
                                                            <?php }
                                                        }
                                                        ?>
                                                </div>
                                            </li>
                                        </ul>                   
                                    </div><!--/Response-area-->
                                </div>
                            </div>
                            <div class="media" style="margin-bottom: 60px; ">
                                <div class="post-comment">
                                    <h3>Post your answer</h3>
                                    <form id="" name="" method="post" action="<?php echo base_url('home/add_answer/'.$question_det['id']); ?>">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" required="required" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="answer" id="answer" required="required" class="form-control" rows="8" placeholder="Your answer"></textarea>
                                        </div>                        
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-submit" value="Submit" style="width: auto; ">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Comments</h3>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="images/portfolio/project1.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="images/portfolio/project2.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="images/portfolio/project3.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Lorem ipsum<span class="pull-right">(1)</span></a></li>
                                <li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a></li>
                                <li><a href="#">Adipisicing elit<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Sed do<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Eiusmod<span class="pull-right">(3)</span></a></li>
                                <li><a href="#">Mockup<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Ut enim ad minim <span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Veniam, quis nostrud <span class="pull-right">(8)</span></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                            <h3>Tag Cloud</h3>
                            <ul class="nav nav-pills">
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Joomla</a></li>
                                <li><a href="#">Abstract</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Product</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item popular">
                            <h3>Latest Photos</h3>
                            <ul class="gallery">
                                <li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular5.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
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
