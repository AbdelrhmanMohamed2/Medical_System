<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="@yield('about_video')"
                    class="glightbox play-btn mb-4"></a>
            </div>

            <div
                class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                <h3>@yield('about_title')</h3>
                <p>@yield('about_description')</p>

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-fingerprint"></i></div>
                    <h4 class="title"><a href="">@yield('about_box-one_title')</a></h4>
                    <p class="description">@yield('about_box-one_description')</p>
                </div>

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">@yield('about_box-two_title')</a></h4>
                    <p class="description">@yield('about_box-two_description')</p>
                </div>

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-atom"></i></div>
                    <h4 class="title"><a href="">@yield('about_box-three_title')</a></h4>
                    <p class="description">@yield('about_box-three_description')</p>
                </div>

            </div>
        </div>

    </div>
</section><!-- End About Section -->
