 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="active"><a href="/"><i class="fa fa-circle-o"></i> Home</a></li>
            <li class="active"><a href="{{route('dash')}}"><i class="fa fa-circle-o"></i> Dashboard </a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span> Article Related</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('archives.create')}}"><i class="fa fa-circle-o"></i>Create Issue </a></li>
            <li><a href="{{route('papers.index')}}"><i class="fa fa-circle-o"></i> Call for Paper Responses</a></li>
            <li><a href="{{route('articles')}}"><i class="fa fa-circle-o"></i> Single Artlce Response</a></li>

            <li><a href="{{route('publish.create')}}"><i class="fa fa-circle-o"></i> Publish</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Visitor Related</span>
            <span class="pull-right-container">
              <i class="faofa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user')}}"><i class="fa fa-circle-o"></i> All Reg Users</a></li>
            <li><a href="{{route('articles')}}"><i class="fa fa-circle-o"></i> All Article Recieved</a></li>
            <li class="active"><a href="{{route('contact_us')}}">User Complains</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Archive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('archives')}}"><i class="fa fa-circle-o"></i> All Archive</a></li>



          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Editorial board</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('editors')}}"><i class="fa fa-circle-o"></i> Applicants for Editor</a></li>

            <li><a href="{{route('remove')}}"><i class="fa fa-circle-o"></i>  Board of Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cart-o"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Create Category</a></li>
            <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> All Categories</a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-money-bill-alt"></i> <span>Publication Fee </span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('fee.create')}}"><i class="fa fa-circle-o"></i> Create Fee</a></li>
                <li><a href="{{route('fee.index')}}"><i class="fa fa-circle-o"></i> All Fee</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-money-bill-alt"></i> <span>Transactions </span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('tranx')}}"><i class="fa fa-circle-o"></i> All Transaction</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> All Fee</a></li>
            </ul>
        </li>

        <li class="treeview active">
            <a href="mailbox.html">
              <i class="fa fa-envelope"></i> <span>Mailbox</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li>
                <a href="3">Inbox
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">13</span>
                  </span>
                </a>
              </li>
            <li><a href="{{route('compose')}}">Compose</a></li>

            </ul>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
