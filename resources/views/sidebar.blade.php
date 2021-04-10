<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Principal</li>
        <li class="sidebar">
          <a href="/accueil">
            <i class="fa fa-dashboard"></i> <span>Accueil</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/comptes">
            <i class="fa fa-briefcase"></i> <span>Mes Comptes</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/credit">
            <i class="fa fa-pie-chart"></i><span>Demander un crédit</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/contact">
            <i class="fa fa-phone"></i>
            <span>Nous contacter</span>
          </a>
        </li>

        @if( Auth::user()->hasRole('Marchand') || Auth::user()->hasRole('Admin') )
        <li class="header">Menu Marchand</li>
        <li class="sidebar">
          <a href="/marchand/clients">
            <i class="fa fa-users"></i> <span>Mes Clients</span>
          </a>
        </li>
        <li class="sidebar">
          <a href="/marchand/operations">
            <i class="fa fa-cogs"></i> <span>Opérations</span>
          </a>
        </li>
        @endif

        @if( Auth::user()->hasRole('Admin') )
        <li class="header">Menu Admin</li>
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
          <a href="/admin/marchands">
            <i class="fa fa-male"></i> <span>Marchands</span>
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
        <li class="sidebar">
          <a href="/admin/autres">
            <i class="fa fa-plus"></i> <span>Autres</span>
          </a>
        </li>
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>