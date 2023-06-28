<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard.index') }}" class="brand-link">
        <img src="{{ asset('Admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Medical-System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/' . strtolower(auth()->user()->type) . '/' . (auth()->user()->image ?? 'default_image.png')) }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.dashboard.profile') }}" class="d-block">{{ auth()->user()->type }} :
                    {{ auth()->user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (in_array(auth()->user()->type, ['Admin', 'Doctor']))
                    {{-- patients --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-hospital-user"></i>
                            <p>
                                Patients
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.patients.index') }}" class="nav-link">
                                    <i class="fa-solid fa-hospital"></i>
                                    <p>All Patients</p>
                                </a>
                            </li>

                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.examinations.get_all_examinations') }}" class="nav-link">
                                    <i class="fa-solid fa-hand-holding-heart"></i>
                                    <p>Examinations</p>
                                </a>
                            </li>

                            <li class="nav-item  pl-3">
                                <a href="{{ route('admin.dashboard.patients.create') }}" class="nav-link">
                                    <i class="fa-solid fa-bed-pulse"></i>
                                    <p>Add New Patient</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                @if (auth()->user()->type == 'Admin')
                    {{-- doctors --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon fas fa-chart-pie"></i> --}}
                            <i class="fa-solid fa-user-doctor"></i>
                            {{-- <i class="fa-solid fa-user-doctor" style="color: #ffffff;"></i> --}}
                            <p>
                                Doctors
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.doctors.index') }}" class="nav-link">
                                    <i class="fa-regular fa-hospital"></i>
                                    <p>All Doctors</p>
                                </a>
                            </li>

                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.doctors.create') }}" class="nav-link">
                                    <i class="fa-solid fa-stethoscope"></i>
                                    <p>Add New Doctor</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- Specialties --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">

                            <i class="fa-solid fa-hand-holding-medical"></i>
                            <p>
                                Specialties
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.specialty.index') }}" class="nav-link">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <p>All Specialties</p>
                                </a>
                            </li>

                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.specialty.create') }}" class="nav-link">
                                    <i class="fa-solid fa-heart-pulse"></i>
                                    <p>Add New Speciality</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- Admins --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-user-shield"></i>
                            <p>
                                Admins
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.admins.index') }}" class="nav-link">
                                    <i class="fa-solid fa-users-gear"></i>
                                    <p>All Admins</p>
                                </a>
                            </li>

                            <li class="nav-item pl-3">
                                <a href="{{ route('admin.dashboard.admins.create') }}" class="nav-link">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <p>Add New Admin</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- Settengs --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.settings.index') }}" class="nav-link">
                            {{-- <i class="nav-icon fas fa-chart-pie"></i> --}}
                            {{-- <i class="fa-solid fa-user-doctor"></i> --}}
                            <i class="fa-solid fa-gear"></i>
                            {{-- <i class="fa-solid fa-user-doctor" style="color: #ffffff;"></i> --}}
                            <p>
                                Settengs
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                    </li>
                @endif



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
