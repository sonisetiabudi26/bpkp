<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;padding-top:10px">
      <a href="index.html" class="site_title"><img style="height:35px;padding-right:10px;" src="<?php echo base_url('assets/other/media/img/logo/bpkp.png') ?>" /> <span>SYSTEM</span></a>
    </div>
    <div class="clearfix"></div>
    <hr class="line">
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic" id="pic">
        <img src="<?php echo base_url('assets/img/content/user.png') ?>" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Selamat Datang,</span>
        <h2><?php echo $username ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3 style="color:#ADABAB !important">Utama</h3>
        <ul class="nav side-menu">
			<?php
				foreach ($menu_page as $menupages):
					##column case sensitive
				?>
				<li><a href="<?php echo base_url('sertifikasi')."/".$menupages->MENU_URL?>"><i class="fa fa-<?php echo $menupages->MENU_ICON;?>"></i><?php echo $menupages->MENU_NAME;?></a>
			<?php
				endforeach;
			?>
          <!-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="form.html">General Form</a></li>
              <li><a href="form_advanced.html">Advanced Components</a></li>
              <li><a href="form_validation.html">Form Validation</a></li>
              <li><a href="form_wizards.html">Form Wizard</a></li>
              <li><a href="form_upload.html">Form Upload</a></li>
              <li><a href="form_buttons.html">Form Buttons</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="general_elements.html">General Elements</a></li>
              <li><a href="media_gallery.html">Media Gallery</a></li>
              <li><a href="typography.html">Typography</a></li>
              <li><a href="icons.html">Icons</a></li>
              <li><a href="glyphicons.html">Glyphicons</a></li>
              <li><a href="widgets.html">Widgets</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="inbox.html">Inbox</a></li>
              <li><a href="calendar.html">Calendar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="tables.html">Tables</a></li>
              <li><a href="tables_dynamic.html">Table Dynamic</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="chartjs.html">Chart JS</a></li>
              <li><a href="chartjs2.html">Chart JS2</a></li>
              <li><a href="morisjs.html">Moris JS</a></li>
              <li><a href="echarts.html">ECharts</a></li>
              <li><a href="other_charts.html">Other Charts</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
              <li><a href="fixed_footer.html">Fixed Footer</a></li>
            </ul>
          </li> -->
        </ul>
      </div>
      <!-- <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="e_commerce.html">E-commerce</a></li>
              <li><a href="projects.html">Projects</a></li>
              <li><a href="project_detail.html">Project Detail</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <li><a href="profile.html">Profile</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="page_403.html">403 Error</a></li>
              <li><a href="page_404.html">404 Error</a></li>
              <li><a href="page_500.html">500 Error</a></li>
              <li><a href="plain_page.html">Plain Page</a></li>
              <li><a href="login.html">Login Page</a></li>
              <li><a href="pricing_tables.html">Pricing Tables</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#level1_1">Level One</a>
                <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li class="sub_menu"><a href="level2.html">Level Two</a>
                    </li>
                    <li><a href="#level2_1">Level Two</a>
                    </li>
                    <li><a href="#level2_2">Level Two</a>
                    </li>
                  </ul>
                </li>
                <li><a href="#level1_2">Level One</a>
                </li>
            </ul>
          </li>
          <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
        </ul>
      </div> -->

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Keluar" href="<?php echo base_url('login/logout'); ?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
