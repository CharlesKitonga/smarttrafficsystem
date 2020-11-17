 <div class="sidebar" data-color="purple" data-image="{{asset('img/sidebar-5.jpg')}}">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Admin Dashboard
                </a>
            </div>

            <ul class="nav">
                @can('admin')
                    <li class="active">
                        <a href="{{url('/home')}}">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/user')}}">
                            <i class="pe-7s-user"></i>
                            <p>View Users</p>
                        </a>
                    </li>
                     <li>
                        <a href="{{url('/add-offenses')}}">
                            <i class="pe-7s-look"></i>
                            <p>Add Traffic Offenses</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/view-traffic-offenses')}}">
                            <i class="pe-7s-note2"></i>
                            <p>View Traffic Offenses</p>
                        </a>
                    </li>
                   <li>
                        <a href="{{url('/view-committed-offenses')}}">
                            <i class="pe-7s-note2"></i>
                            <p>Commited Offense List</p>
                        </a>
                    </li>
                   <li>
                        <a href="{{url('/site-settings')}}">
                            <i class="pe-7s-tools"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                @endcan
                
                @can('officer')
                    <li class="active">
                        <a href="{{url('/home')}}">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                     <li>
                        <a href="{{url('/add-offenses')}}">
                            <i class="pe-7s-look"></i>
                            <p>Add Traffic Offenses</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/view-traffic-offenses')}}">
                            <i class="pe-7s-note2"></i>
                            <p>View Traffic Offenses</p>
                        </a>
                    </li>
                   <li>
                        <a href="{{url('/view-committed-offenses')}}">
                            <i class="pe-7s-note2"></i>
                            <p>Commited Offense List</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/site-settings')}}">
                            <i class="pe-7s-tools"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                @endcan 
                 @can('normal_user')
                    <li class="active">
                        <a href="{{url('/home')}}">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/view-traffic-offenses')}}">
                            <i class="pe-7s-note2"></i>
                            <p>View Traffic Offenses</p>
                        </a>
                    </li>
                   <li>
                        <a href="{{url('/committed-offenses')}}">
                            <i class="pe-7s-note2"></i>
                            <p>Commited Offenses</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/site-settings')}}">
                            <i class="pe-7s-tools"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                @endcan    
            </ul>
    	</div>
    </div>