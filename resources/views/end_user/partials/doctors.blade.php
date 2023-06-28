<!-- ======= Doctors Section ======= -->
<section id="doctors" class="doctors">
    <div class="container">

        <div class="section-title">
            <h2>Doctors</h2>
            <p>@yield('doctors_description')</p>
        </div>

        <div class="row">

            @foreach ($doctors as $doctor)
                <div class="col-lg-6">

                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset($doctor::UPLOAD_PATH  . ($doctor->user->image ?? 'default_doctor.png')) }}"
                                class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>{{ $doctor->user->name }}</h4>
                            <span>{{ $doctor->specialty->name }}</span>
                            <p>{{ $doctor->description }}</p>
                            <p>{{ $doctor->user->email }}</p>
                        </div>
                    </div>

                </div>
            @endforeach



        </div>

    </div>
</section><!-- End Doctors Section -->
