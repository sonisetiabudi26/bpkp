<link href="<?php echo base_url('assets/css/style-navbar.css')?>" rel="stylesheet">
<nav class="navbar navbar-default" style="border:0px;opacity:0.9;">
    <!-- Brand and toggle get grouped for better mobile display -->
   	<div class="navbar-header">
       <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
    	    <span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
   		<a href="#" class="navbar-brand">
			<img height="30" src="<?php echo base_url('assets/other/media/img/logo/bpkp.png') ?>" />
		</a>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#myModal" data-toggle="modal" id="data" data-target="#modal-content"> <span class="glyphicon glyphicon-search"></span></a></li>
        	</ul>
        	<ul class="nav navbar-nav" style="float: right">
        	<li >
        	<a href="#myModal" data-toggle="modal" id="allData" data-target="#modal-content"> View All Data </a></li>
        	</ul>
    </div>
</nav>