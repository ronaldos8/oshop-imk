
<body>
  <div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><span class="highlight">
      Welcome,
      <?php echo $this->session->userdata('admin_name'); ?>
    </span></a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="<?php if(isset($menu_dashboard)) echo $menu_dashboard; ?>">
        <a href="<?php echo base_url('admin'); ?>">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li class="<?php if(isset($menu_trx)) echo $menu_trx; ?>">
        <a href="<?php echo base_url('admin/transaksi'); ?>">
          <div class="icon">
            <i class="fa fa-exchange" aria-hidden="true"></i>
          </div>
          <div class="title">Transaksi</div>
        </a>
      </li>
      <li class="@@menu.messaging <?php if(isset($menu_chat)) echo $menu_chat; ?>">
        <a href="<?php echo  base_url('admin/chat'); ?>">
          <div class="icon">
            <i class="fa fa-comments" aria-hidden="true"></i>
          </div>
          <div class="title">Obrolan</div>
        </a>
      </li>
      <li class="<?php if(isset($menu_product)) echo $menu_product; ?>">
        <a href="<?php echo base_url('admin/produk'); ?>">
          <div class="icon">
            <i class="fa fa-cube" aria-hidden="true"></i>
          </div>
          <div class="title">Product</div>
        </a>
      </li>
      <li class="dropdown <?php if(isset($menu_other)) echo $menu_other; ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-file-o" aria-hidden="true"></i>
          </div>
          <div class="title">Lainnya</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <!-- <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Admin</li> -->
            <li><a href="<?php echo base_url('admin/kategori'); ?>">Kategori</a></li>
            <li><a href="./pages/profile.html">Profile</a></li>
            <li><a href="./pages/search.html">Search</a></li>
            <li class="line"></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
  <div class="sidebar-footer">
    <ul class="menu">
      <li>
        <a href="/" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-cogs" aria-hidden="true"></i>
        </a>
      </li>
    </ul>
  </div>
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>