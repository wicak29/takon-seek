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
                            <textarea id="elm1" name="q_text" rows="15" cols="80" style="width: 80%" required="required"></textarea>
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
