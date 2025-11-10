<?php
    $user=getAuthInfo($_SESSION['id']);
?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="../view/dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <?php
                    if($_SESSION['role']==1){ 
                ?>
                <!-- Teacher here -->
                <div class="sb-sidenav-menu-heading">Kegunaan Pengajar</div>
                <a class="nav-link" href="../view/class_teacher_list.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Senarai Kelas Pengajar
                </a>
                <a class="nav-link" href="../view/class_teacher_add.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tambah Kelas Baharu
                </a>
                <?php } ?>
                <?php
                    if($_SESSION['role']==3){
                ?>
                <!-- Student sidebar here -->
                <div class="sb-sidenav-menu-heading">Kelas Mengaji</div>
                <a class="nav-link" href="../view/class_avail_list.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Senarai Kelas
                </a>
                <a class="nav-link" href="../view/booking_list.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Kelas Saya
                </a>
                <?php } ?>
                <?php
                    if($_SESSION['role']==1){
                ?>
                <!-- Admin sidebar here -->
                <div class="sb-sidenav-menu-heading">Kegunaan Admin</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pengguna
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../view/student_list.php">Senarai Pelajar</a>
                        <a class="nav-link" href="../view/teacher_list.php">Senarai Pengajar</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseClass" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Kelas
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseClass" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../view/class_list.php">Senarai Kelas</a>
                    </nav>
                </div>
                <a class="nav-link" href="../view/mosque_list.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Senarai Masjid
                </a>
                <?php } ?>
            </div>
        </div>
        <?php
            if($_SESSION['role']==3){
                $name=$user->studentusername;
            } else if($_SESSION['role']==1){
                $name=$user->teacherusername;
            }
        ?>
        <div class="sb-sidenav-footer">
            <div class="small">
                Logged in as: <?php echo $name ?>
            </div>
            <!-- Username here -->
        </div>
    </nav>
</div>