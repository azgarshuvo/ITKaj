<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:37 PM
 */
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="">
                <a href="{{route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('adminAdd')}}">Add Admin</a></li>
                    <li><a href="{{route('adminList')}}">Admin List</a></li>
                </ul>
            </li>
            {{--<li>--}}
                {{--<a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span> <span class="label label-primary pull-right">NEW</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="graph_flot.html">Flot Charts</a></li>--}}
                    {{--<li><a href="graph_morris.html">Morris.js Charts</a></li>--}}
                    {{--<li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>--}}
                    {{--<li><a href="graph_chartjs.html">Chart.js</a></li>--}}
                    {{--<li><a href="graph_peity.html">Peity Charts</a></li>--}}
                    {{--<li><a href="graph_sparkline.html">Sparkline Charts</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="mailbox.html">Inbox</a></li>--}}
                    {{--<li><a href="mail_detail.html">Email view</a></li>--}}
                    {{--<li><a href="mail_compose.html">Compose email</a></li>--}}
                    {{--<li><a href="email_template.html">Email templates</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span> </a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="form_basic.html">Basic form</a></li>--}}
                    {{--<li><a href="form_advanced.html">Advanced Plugins</a></li>--}}
                    {{--<li><a href="form_wizard.html">Wizard</a></li>--}}
                    {{--<li><a href="form_file_upload.html">File Upload</a></li>--}}
                    {{--<li><a href="form_editors.html">Text Editor</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>  <span class="pull-right label label-primary">SPECIAL</span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="contacts.html">Contacts</a></li>--}}
                    {{--<li><a href="profile.html">Profile</a></li>--}}
                    {{--<li><a href="projects.html">Projects</a></li>--}}
                    {{--<li><a href="project_detail.html">Project detail</a></li>--}}
                    {{--<li><a href="file_manager.html">File manager</a></li>--}}
                    {{--<li><a href="calendar.html">Calendar</a></li>--}}
                    {{--<li><a href="faq.html">FAQ</a></li>--}}
                    {{--<li><a href="timeline.html">Timeline</a></li>--}}
                    {{--<li><a href="pin_board.html">Pin board</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="search_results.html">Search results</a></li>--}}
                    {{--<li><a href="lockscreen.html">Lockscreen</a></li>--}}
                    {{--<li><a href="invoice.html">Invoice</a></li>--}}
                    {{--<li><a href="login.html">Login</a></li>--}}
                    {{--<li><a href="login_two_columns.html">Login v.2</a></li>--}}
                    {{--<li><a href="register.html">Register</a></li>--}}
                    {{--<li><a href="404.html">404 Page</a></li>--}}
                    {{--<li><a href="500.html">500 Page</a></li>--}}
                    {{--<li><a href="empty_page.html">Empty page</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info pull-right">NEW</span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="toastr_notifications.html">Notification</a></li>--}}
                    {{--<li><a href="nestable_list.html">Nestable list</a></li>--}}
                    {{--<li><a href="timeline_2.html">Timeline v.2</a></li>--}}
                    {{--<li><a href="forum_main.html">Forum view</a></li>--}}
                    {{--<li><a href="google_maps.html">Google maps</a></li>--}}
                    {{--<li><a href="code_editor.html">Code editor</a></li>--}}
                    {{--<li><a href="modal_window.html">Modal window</a></li>--}}
                    {{--<li><a href="validation.html">Validation</a></li>--}}
                    {{--<li><a href="tree_view.html">Tree view</a></li>--}}
                    {{--<li><a href="chat_view.html">Chat view</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="typography.html">Typography</a></li>--}}
                    {{--<li><a href="icons.html">Icons</a></li>--}}
                    {{--<li><a href="draggable_panels.html">Draggable Panels</a></li>--}}
                    {{--<li><a href="buttons.html">Buttons</a></li>--}}
                    {{--<li><a href="video.html">Video</a></li>--}}
                    {{--<li><a href="tabs_panels.html">Tabs & Panels</a></li>--}}
                    {{--<li><a href="notifications.html">Notifications & Tooltips</a></li>--}}
                    {{--<li><a href="badges_labels.html">Badges, Labels, Progress</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="table_basic.html">Static Tables</a></li>--}}
                    {{--<li><a href="table_data_tables.html">Data Tables</a></li>--}}
                    {{--<li><a href="jq_grid.html">jqGrid</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="basic_gallery.html">Lightbox Gallery</a></li>--}}
                    {{--<li><a href="carousel.html">Bootstrap Carusela</a></li>--}}

                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                        {{--<a href="#">Third Level <span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-third-level">--}}
                            {{--<li>--}}
                                {{--<a href="#">Third Level Item</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Third Level Item</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Third Level Item</a>--}}
                            {{--</li>--}}

                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">Second Level Item</a></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Second Level Item</a></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Second Level Item</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>--}}
            {{--</li>--}}
            {{--<li class="landing_link">--}}
                {{--<a target="_blank" href="Landing_page/index.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>--}}
            {{--</li>--}}
            {{--<li class="special_link">--}}
                {{--<a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>--}}
            {{--</li>--}}
        </ul>

    </div>
</nav>
