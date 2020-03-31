<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Principal</li>
        <li class="sidebar">
          <a href="/">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/credit">
            <i class="fa fa-pie-chart"></i><span>Demander un crédit</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/documentation">
            <i class="fa fa-book"></i> <span>Documentation</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/contact">
            <i class="fa fa-phone"></i>
            <span>Contact</span>
          </a>
        </li>

        @if( Auth::user()->hasRole('Admin') )
        <li class="header">Menu admin</li>
        <li class="sidebar">
          <a href="/admin/membres">
            <i class="fa fa-user"></i> <span>Membres</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/admin/transactions">
            <i class="fa fa-exchange"></i> <span>Transactions</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/admin/messages">
            <i class="fa fa-comments text-aqua"></i> <span>Messages</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
        </li>
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>