
     <!-- Main Sidebar Container -->
     <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#315c72 !important" >
      <!-- Brand Logo -->
      <a href="#" class="brand-link" style="background-color:#315c72 !important">
        <img src="{{asset('logo/nluis.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NLUIS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('profiles/male.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview {{active(['admin/v2users*', 'admin/v2locations*','admin/v2landuseplans*'])?'menu-open':''}}">
                    <a href="#" class="nav-link {{active(['admin/v2users*', 'admin/v2locations*','admin/v2landuseplans*'])}}">
                      <i class="nav-icon fas fa-tachometer-alt red"></i>
                      <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                      <a href="{{ route('admin.dashboard.user') }}" class="nav-link {{active('admin/v2users*')}}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>System Users</p>
                        </a>
                      </li>
                      <li class="nav-item">
                      <a href="{{ route('admin.dashboard.location') }}" class="nav-link {{active('admin/v2locations*')}}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Location</p>
                        </a>
                      </li>
                    
                      <li class="nav-item">
                        <a href="{{ route('admin.dashboard.landuseplan') }}" class="nav-link {{active('admin/v2landuseplans*')}}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Land Use Plans</p>
                        </a>
                      </li>
                      
                    </ul>
                  </li>
                 <!-- User Management -->
                <li class="nav-item has-treeview {{active(['admin/roles*', 'admin/permissions*','admin/users*'])?'menu-open':''}}">

                <a href="#" class="nav-link {{active(['admin/roles*', 'admin/permissions*','admin/users*'])}}">
                  <i class="nav-icon fas fa-users orange"></i>
                  <p>
                  Users Settings
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
        
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link  {{active('admin/users*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                      <p>Users</p>
                    </a>
                  </li>
        
                  <li class="nav-item">
                    <a href="{{route('admin.role.index')}}" class="nav-link {{active('admin/roles*')}}">
                    <i class="far fa-circle nav-icon green"></i>
                      <p>Roles</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.permission.index')}}" class="nav-link  {{active('admin/permissions*')}}">
                    <i class="far fa-circle nav-icon green"></i>
                      <p>Permissions</p>
                    </a>
                  </li>
                </ul>
              </li>

               <!-- Land Use Management -->
             <!-- <li class="nav-item has-treeview {{active(['admin/land-use-plans*','admin/shape-files*','admin/land_plan-use-crops*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*'])?'menu-open':''}}"> -->
             <li class="nav-item has-treeview {{active(['admin/land-use-plans*','admin/shape-files*'])?'menu-open':''}}"> 
             <a href="#" class="nav-link {{active(['admin/land-use-plans*','admin/shape-files*'])}}">

                <!-- <a href="#" class="nav-link {{active(['admin/land-use-plans*','admin/shape-files*','admin/land_plan-use-crops*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*'])}}"> -->
                  <i class="nav-icon fas fa-bacon teal"></i>
                  <p>
                  Land Use Management
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.land_use_plan.index') }}" class="nav-link  {{active('admin/land-use-plans*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                      <p>Land Use Plans</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.shape_file.index') }}" class="nav-link {{active('admin/shape-files*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                      <p>Shape Files</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="{{ route('admin.land_use_plan_crop.index') }}" class="nav-link {{active('admin/land_plan-use-crops*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                      <p>Village Crops</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.land_use_plan_farming_method.index') }}" class="nav-link {{active('admin/land_use_plan_farming_method*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                      <p>Farming Methods</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.land_use_plan_farming_practice.index') }}" class="nav-link {{active('admin/land_use_plan_farming_practice*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                      <p>Farming Practices</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.land_use_plan_farming_technique.index') }}" class="nav-link {{active('admin/land_use_plan_farming_technique*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                      <p>Farming Techniques</p>
                    </a>
                  </li> -->
                  
                </ul>
              </li>

 
  

            <!-- LUP DATA -->
            <!-- all the uri of sectors should be added here -->
            <li class="nav-item has-treeview {{active(
              [

              'admin/land-use-distributions*',
              'admin/lup-data/livestocks*',
              'admin/lup-data/agriculture*',
              'admin/land_plan-use-crops*','admin/cultivated_land_yield*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*',
              'admin/land_plan-use-livestocks*','admin/livestock_projection*','admin/land_use_plan_farming_method*','admin.diary_keeper.index','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*',
             
              ])?'menu-open':''}}">

              <a href="#" class="nav-link {{active(
                [

                'admin/land-use-distributions*',
                'admin/lup-data/livestocks*',
                'admin/lup-data/agriculture*',
                'admin/land_plan-use-crops*','admin/cultivated_land_yield*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*',
                'admin/land_plan-use-livestocks*','admin/livestock_projection*','admin/land_use_plan_farming_method*','admin.diary_keeper.index','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*',
                
                ])}}">
                <i class="nav-icon fab fa-accusoft teal"></i>
                <p>
                LUP Data
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="{{ route('admin.land_use_distribution.index') }}" class="nav-link {{active(['admin/land-use-distributions*'])}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Land Distributions</p>
                  </a>
                </li>
                <!-- all the uri should be added here -->
                <li class="nav-item">
                  <a href="{{  route('admin.lup_agri.index')}}" class="nav-link {{active(
                    [
                      'admin/lup-data/agriculture*','admin/land_plan-use-crops*','admin/cultivated_land_yield*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*'
                    ])}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Agriculture</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.lup_liv.index') }}" class="nav-link {{active(
                    [
                      'admin/lup-data/livestocks*','admin/land_plan-use-livestocks*','admin/livestock_projection*','admin/land_use_plan_farming_method*','admin.diary_keeper.index','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*'
                    ])}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Livestock And Fisheries</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.lup_res.index') }}" class="nav-link {{active(
                    [
                      'admin/lup-data/resources*','admin/land_plan-use-livestocks*','admin/livestock_projection*','admin/land_use_plan_farming_method*','admin.diary_keeper.index','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*'
                    ])}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Natural Resources</p>
                  </a>
                </li>

               <li class="nav-item">
                  <a href="{{  route('admin.lup_wate.index')}}" class="nav-link {{active(
                    [
                      'admin/lup-data/water*','admin/land_plan-use-crops*','admin/cultivated_land_yield*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*'
                    ])}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Water Resources</p>
                  </a>
                </li>

              <li class="nav-item">
                  <a href="{{  route('admin.lup_phys.index')}}" class="nav-link {{active(
                    [
                      'admin/lup-data/physical_social*','admin/land_plan-use-crops*','admin/cultivated_land_yield*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*'
                    ])}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Phy/Soc Infrastructure</p>
                  </a>
                </li>

              <li class="nav-item">
                  <a href="{{  route('admin.lup_stak.index')}}" class="nav-link {{active(
                    [
                      'admin/lup-data/stakeholders*','admin/land_plan-use-crops*','admin/cultivated_land_yield*','admin/land_use_plan_farming_method*','admin/land_use_plan_farming_practice*','admin/land_use_plan_farming_technique*','admin/land_use_plan_farm_input*','admin/irrigated_potential_area*','admin/area_under_irrigation*'
                    ])}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Stakeholders</p>
                  </a>
                </li>
               
              </ul>
              </li>

              <!-- Location Settings -->
              <li class="nav-item has-treeview {{active(['admin/regions*', 'admin/districts*','admin/wards*','admin/villages*','admin/hamlets*'])?'menu-open':''}}">

                  <a href="#" class="nav-link {{active(['admin/regions*', 'admin/districts*','admin/wards*','admin/villages*','admin/hamlets*'])}}">
                    <i class="nav-icon fa fa-map-marker red"></i>
                    <p>
                    Location Management
                      <i class="right fa fa-angle-left"></i>
                    </p>
                  </a>
        
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('admin.region.index')}}" class="nav-link  {{active('admin/regions*')}}">
                        <i class="far fa-circle nav-icon green"></i>
                        <p>Regions</p>
                      </a>
                    </li>
          
                    <li class="nav-item">
                      <a href="{{route('admin.district.index')}}" class="nav-link {{active('admin/districts*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                        <p>Districts</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('admin.ward.index')}}" class="nav-link  {{active('admin/wards*')}}">
                      <i class="far fa-circle nav-icon green"></i>
                        <p>Wards </p>
                      </a>
                    </li>
                   
                     <li class="nav-item">
                      <a href="{{route('admin.village.index')}}" class="nav-link  {{active('admin/villages')}}">
                      <i class="far fa-circle nav-icon green"></i>
                        <p>Villages </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('admin.hamlet.index')}}" class="nav-link  {{active('admin/hamlets')}}">
                      <i class="far fa-circle nav-icon green"></i>
                        <p>Hamlets </p>
                      </a>
                    </li>
                   
                  </ul>
              </li>

              <!-- Map Settings -->
              <!-- <li class="nav-item has-treeview {{active(['admin/maps*'])?'menu-open':''}}">

              <a href="#" class="nav-link {{active(['admin/maps*'])}}">
                <i class="nav-icon fa fa-map-marker brown"></i>
                <p>
                Map
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.map.index')}}" class="nav-link  {{active('admin/maps*')}}">
                    <i class="far fa-circle nav-icon green"></i>
                    <p>Morogoro</p>
                  </a>
                </li>
              </ul>
              </li> -->

              <!-- Reports Management -->
              <li class="nav-item">
                <a href="{{ route('admin.report.index') }}" class="nav-link {{active(['admin/reports*','admin/reports/land-use-distributions*'])}}">
                  <i class="nav-icon fas fa-th"></i>
                    <p>
                    Reports
                    <span class="right badge badge-success">pdf</span>
                  </p>
                </a>
              </li>
       

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
