<?php $this->load->view('components/page_head'); ?>
    <body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="brand"><i>Grupa 2</i></a>
        </div>
    </div>
</div>
<div id="body-container">
    <div id="body-content">
        <div class='container'>
            <div class="row">
                <div class="span16">
                    <?php $this->load->view($subview); ?>
                </div>
                <div class="span4">

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('components/page_foot'); ?>