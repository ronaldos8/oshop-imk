<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="<?php echo base_url('admin/soon'); ?>"><span class="highlight"><?php echo $this->session->userdata('admin_name'); ?></span></a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="<?php echo base_url('assets/images/default.png'); ?>">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title"><b><?php echo $page_header; ?></b></li>
        <li class="navbar-search hidden-sm">
          <input id="search" type="text" placeholder="Search..">
          <button class="btn-search"><i class="fa fa-search"></i></button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown notification">
          <a href="<?php echo base_url('admin/soon'); ?>" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
            <div class="title">New Orders</div>
            <div class="count">0</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Ordering</li>
              <li class="dropdown-empty">No New Ordered</li>
              <li class="dropdown-footer">
                <a href="<?php echo base_url('admin/soon'); ?>">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown notification warning">
          <a href="<?php echo base_url('admin/soon'); ?>" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
            <div class="title">Unread Messages</div>
            <div class="count">99</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Message</li>
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  <span class="badge badge-warning pull-right">10</span>
                  <div class="message">
                    <img class="profile" src="<?php echo base_url('assets/images/user.png'); ?>">
                    <div class="content">
                      <div class="title">"Kofirmasi Pembayaran.."</div>
                      <div class="description">Eeng</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  <span class="badge badge-warning pull-right">5</span>
                  <div class="message">
                    <img class="profile" src="<?php echo base_url('assets/images/user.png'); ?>">
                    <div class="content">
                      <div class="title">"Hello World"</div>
                      <div class="description">Dadang</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  <span class="badge badge-warning pull-right">2</span>
                  <div class="message">
                    <img class="profile" src="<?php echo base_url('assets/images/user.png'); ?>">
                    <div class="content">
                      <div class="title">"Konfirmasi pemesanan.."</div>
                      <div class="description">bambang</div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-footer">
                <a href="<?php echo base_url('admin/soon'); ?>">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown notification danger">
          <a href="<?php echo base_url('admin/soon'); ?>" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
            <div class="title">System Notifications</div>
            <div class="count">10</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Notification</li>
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  <span class="badge badge-danger pull-right">8</span>
                  <div class="message">
                    <div class="content">
                      <div class="title">New Order</div>
                      <div class="description">IDR400 total</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  <span class="badge badge-danger pull-right">14</span>
                  Inbox
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  <span class="badge badge-danger pull-right">5</span>
                  Issues Report
                </a>
              </li>
              <li class="dropdown-footer">
                <a href="<?php echo base_url('admin/soon'); ?>">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown profile">
          <a href="<?php echo base_url('admin/soon'); ?>" class="dropdown-toggle"  data-toggle="dropdown">
            <img class="profile-img" src="<?php echo base_url('assets/images/default.png'); ?>">
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username"><?php echo $this->session->userdata('admin_name'); ?></h4>
            </div>
            <ul class="action">
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  Profile
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/chat'); ?>">
                  <span class="badge badge-danger pull-right">5</span>
                  My Inbox
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/soon'); ?>">
                  Setting
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/logout'); ?>">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>