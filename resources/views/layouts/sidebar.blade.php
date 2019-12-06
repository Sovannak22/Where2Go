<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{request()->route()->getName() == 'home' ? 'active' : ''}}"><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="{{request()->is('categories*')? 'active':''}}"><a href="{{url('categories')}}"><i class="fa fa-cubes"></i> <span>Categories</span></a></li>
            <li class="treeview {{request()->is('admin/posts*')? 'active':''}}">
                <a href="#">
                    <i class="fa fa-sticky-note-o"></i> <span>Post</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{request()->is('admin/posts/emergency*')? 'active':''}}"><a href="#"><i class="fa fa-ambulance"></i> Emergency</a></li>
                    <li class="{{request()->is('admin/posts/qa*')? 'active':''}}"><a href="#"><i class="fa fa-question-circle-o"></i> Q & A</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>