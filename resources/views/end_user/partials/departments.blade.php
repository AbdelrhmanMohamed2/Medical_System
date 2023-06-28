<!-- ======= Departments Section ======= -->
<section id="departments" class="departments">
    <div class="container">

        <div class="section-title">
            <h2>Departments</h2>
            <p>@yield('department_description')</p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">

                    @foreach ($specialties as $specialty)
                        <li class="nav-item">
                            <a @class([
                                'nav-link',
                                'active' => $loop->iteration == 1,
                                'show' => $loop->iteration == 1,
                            ]) data-bs-toggle="tab"
                                href="#tab-{{ $loop->iteration }}">{{ $specialty->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-9">
                <div class="tab-content">

                    @foreach ($specialties as $specialty)
                        <div @class([
                            'tab-pane',
                            'active' => $loop->iteration == 1,
                            'show' => $loop->iteration == 1,
                        ]) id="tab-{{ $loop->iteration }}">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>{{ $specialty->name }}</h3>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset($specialty::UPLOAD_PATH . ($specialty->image ?? 'default_image.png')) }}"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>

    </div>
</section><!-- End Departments Section -->
