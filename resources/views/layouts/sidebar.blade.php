      <div class="user-panel">
        <div class="pull-left image">
          <a  href="/profile" ><img src="/assets/profiles/{{ isset(Auth::user()->profile->image) ? Auth::user()->profile->image : 'avatar.jpg' }}" class="img-circle profile-img" alt="User Image"></a>
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        @role('user|super')
          <li><a href="/autoresponders"><i class="fa fa-gears"></i> <span>Autoresponder</span></a></li>
        @endrole






        @role('super')
        <li class="header">MANAGE</li>
        <li><a href="/manage/users"><i class="fa fa-users"></i> <span>User</span></a></li>
        <li><a href="/manage/packages"><i class="fa fa-gift"></i> <span>Package</span></a></li>
        <li><a href="/manage/autoresponders"><i class="fa fa-gears"></i> <span>Autoresponder</span></a></li>

        @endrole

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->