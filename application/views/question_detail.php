     <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-7">
                            <h1 class="title">TAKON SEEK</h1>
                            <p>Ask First Before You Get Lost</p>
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

    <section id="blog-details" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
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
                                                        <p style="font-size: 12pt; "><?php echo $question_det['text']; ?></p>
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
                                                <?php
                                                    if(sizeof($answer_list)==0)
                                                    { ?>
                                                        <h3>No Answer Yet</h3>
                                                    <?php }
                                                    else
                                                    { 
                                                        foreach ($answer_list as $key => $answer) 
                                                        { ?>
                                                        <div class="post-comment">
                                                            <div class="pull-left">
                                                                <img class="media-object" src="<?php echo base_url('assets/multicolor'); ?>/images/blogdetails/5.png" alt="" style="border-left: 0px;">
                                                            </div>
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
                                                                <div class="row" style="margin-left: 0; ">
                                                                    <?php 
                                                                    $status = 0;
                                                                    if ($answer['answer_status']==1)
                                                                    { ?>
                                                                        <button class="btn btn-success btn-xs" title="accepted"><i class="fa fa-check" aria-hidden="true"></i>Accepted</button>
                                                                    <?php 
                                                                    $status = 1;
                                                                    }
                                                                    else
                                                                    { ?>
                                                                        <a href="<?php echo base_url('home/mark_answer/'.$question_det['id'].'/'.$answer['answer_id']); ?>"><button class="btn btn-default btn-xs" title=" mark this answer as accepted">Mark Answer</button></a>
                                                                    <?php 
                                                                    }
                                                                    ?>
                                                                    <a href="<?php echo base_url('home/chat/'.$answer['id']); ?>"><button class="btn btn-default btn-xs">Ask for Video Chat</button></a>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                        <?php }
                                                    }
                                                    ?>
                                            </li>
                                        </ul>                   
                                    </div><!--/Response-area-->
                                </div>
                            </div>
                            <div class="media" style="margin-bottom: 60px; ">

                                <div class="post-comment">
                                    <h2 class="bold">Post your answer</h2>
                                    <form id="" name="" method="post" action="<?php echo base_url('home/add_answer/'.$question_det['id']); ?>">
                                        <div class="form-group">
                                            <textarea id="elm1" name="answer" rows="15" cols="80" style="width: 80%"></textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 80%"></textarea>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label>Upload Video (if you want)</label>
                                            <input id="video_upload" type="file" name="video_upload" class="form-control">
                                        </div>                         -->
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-submit" value="Submit" style="width: auto; ">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-3 col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms" style="margin-top: 50px; ">
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

    <!-- TEXT EDITOR TINYMCE-->
    <script src="<?php echo base_url('assets/tinymce'); ?>/js/tinymce/tinymce.dev.js"</script>
    <script src="<?php echo base_url('assets/tinymce'); ?>/js/tinymce/plugins/table/plugin.dev.js"></script>
    <script src="<?php echo base_url('assets/tinymce'); ?>/js/tinymce/plugins/paste/plugin.dev.js"></script>
    <script src="<?php echo base_url('assets/tinymce'); ?>/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
    <script>
        var RTL = false;

        function mockSpellcheck(method, data, success) {
            if (method == "spellcheck") {
                var words = data.match(this.getWordCharPattern());
                var suggestions = {};

                for (var i = 0; i < words.length; i++) {
                    suggestions[words[i]] = ["First", "second"];
                }

                success({words: suggestions, dictionary: true});
            }

            if (method == "addToDictionary") {
                success();
            }
        }

        tinymce.init({
            selector: "textarea#elm1",
            rtl_ui: RTL,

            theme: "modern",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern"
            ],
            external_plugins: {
                //"moxiemanager": "/moxiemanager-php/plugin.js"
            },
            content_css: "<?php echo base_url('assets/tinymce'); ?>/tests/manual/css/development.css",
            add_unload_trigger: false,

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table",

            image_advtab: true,

            style_formats: [
                {title: 'Bold text', format: 'h1'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],

            template_replace_values : {
                username : "Jack Black"
            },

            template_preview_replace_values : {
                username : "Preview user name"
            },

            link_class_list: [
                {title: 'Example 1', value: 'example1'},
                {title: 'Example 2', value: 'example2'}
            ],

            image_class_list: [
                {title: 'Example 1', value: 'example1'},
                {title: 'Example 2', value: 'example2'}
            ],

            templates: [
                {title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
                {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
            ],

            spellchecker_callback: mockSpellcheck
        });

        tinymce.init({
            selector: "textarea#small",
            toolbar_items_size: 'small',
            rtl_ui: RTL,

            theme: "modern",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern"
            ],
            external_plugins: {
                //"moxiemanager": "/moxiemanager-php/plugin.js"
            },
            content_css: "css/development.css",
            add_unload_trigger: false,

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table",

            image_advtab: true,

            style_formats: [
                {title: 'Bold text', format: 'h1'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],

            template_replace_values : {
                username : "Jack Black"
            },

            template_preview_replace_values : {
                username : "Preview user name"
            },

            link_class_list: [
                {title: 'Example 1', value: 'example1'},
                {title: 'Example 2', value: 'example2'}
            ],

            image_class_list: [
                {title: 'Example 1', value: 'example1'},
                {title: 'Example 2', value: 'example2'}
            ],

            templates: [
                {title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
                {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
            ],

            spellchecker_callback: mockSpellcheck
        });
    </script>
</body>
</html>
