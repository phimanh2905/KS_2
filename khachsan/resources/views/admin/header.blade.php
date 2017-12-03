  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://localhost:8000/">Trang Chủ</a>
    </div>
    <!-- /.navbar-header -->

    
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="input-group custom-search-form">
            <!-- <button class="btn btn-default" type="button">
                <span onclick="openMenu()" class="fixed-top" id="nav-btn">&#9776;</span>
            </button> -->
        </div>
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="http://localhost:8000/roommap"><i class="fa fa-dashboard fa-fw"></i> Sơ đồ phòng</a>
                </li>

                <li>
                    <a href="http://localhost:8000/admin"><i class="fa fa-dashboard fa-fw"></i> Người dùng</a>
                </li>

                <li>
                    <a href="http://localhost:8000/checkoutpolicy"><i class="fa fa-dashboard fa-fw"></i> Chính sách trả phòng</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý dịch vụ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li>
                            <a href="http://localhost:8000/service">Dịch vụ</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/typeofservice">Loại dịch vụ</a>
                        </li>
                        
                        <li>
                            <a href="http://localhost:8000/unit">Đơn vị</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý phòng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost:8000/room">Phòng</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/roomtype">Loại phòng</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/statusroomtype">Loại tình trạng</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/device"> Thiết bị</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý hóa đơn<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost:8000/bill">Hóa đơn</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/billdetail">Chi tiết hóa đơn</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý thuê phòng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost:8000/customer"> Khách hàng</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/roomreservationdetail">Chi tiết phiếu thuê phòng</a>
                        </li>
                    </ul>
                </li>
                

                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý nhận phòng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost:8000/customer"> Khách hàng</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/checkin">Phiếu nhận phòng</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/checkindetail">Chi tiết phiếu nhận phòng</a>
                        </li>
                        <li>
                            <a href="http://localhost:8000/serviceusagelist">Danh sách sử dụng dịch vụ</a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                            
                        </li>
                    </ul>
                </li> -->

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
<!-- <script>
    function openMenu() {
        $('#sidebar-nav navbar-collapse').css("width", "250px");
        $('.body').css("margin-left", "250px");
        $('#nav-btn').attr("onclick", "closeMenu()");
    }
    function closeMenu() {
        $('#sidebar-nav navbar-collapse').css("width", "0px");
        $('.body').css("margin-left", "0px");
        $('#nav-btn').attr("onclick", "openMenu()");
    }
</script> -->