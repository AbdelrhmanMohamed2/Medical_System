@section('title', ' | Profile')
@section('site_name', $settings['Website Name'])
@section('address', $settings['address'])
@section('phone', $settings['phone'])
@section('email', $settings['email'])
<!DOCTYPE html>
<html lang="en">

<head>
    @include('end_user.partials.head')
</head>

<body>
    @include('end_user.partials.header')
    <main id="main">

        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors">
            <div class="container">

                <div class="section-title">
                    <h2>Profile</h2>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">

                        <div class="member d-flex align-items-start">
                            <div class=""><img width="250" height="250"
                                    src="{{ asset('uploads/patient/' . (auth()->user()->image ?? 'default_image.png')) }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{ auth()->user()->name }}</h4>
                                <span>{{ auth()->user()->email }}</span>
                                <p>phone : {{ auth()->user()->phone }}</p>
                                <p>birth date : {{ auth()->user()->patient->birth_date }}</p>
                                <p>address : {{ auth()->user()->patient->address }}</p>
                                <p class="text-info update_info">update info?</p>
                                <p class="text-success examinations">examinations ?</p>
                            </div>
                        </div>

                    </div>

                    <div class="d-none show_me col-12 mb-3">
                        <div class="member">
                            <form method="post" action="{{ route('update_image') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <label for="p_image">Update Your Profile Image</label>
                                <input type="file" name="image" class="" id="p_image">
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <button type="submit" class="btn btn-info d-inline">Upload</button>
                            </form>

                        </div>
                    </div>

                    <div class="d-none show_me col-12 mb-3">
                        <div class="member ">
                            <form method="post" action="{{ route('update_info') }}">
                                @csrf
                                @method('put')
                                <div class="form-group mb-3">
                                    <label for="address">Patient Email</label>
                                    <input type="email" class="form-control"
                                        value="{{ old('email') ?? auth()->user()->email }}" id="email"
                                        name="email"> @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address">Patient Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3">{{ old('address') ?? auth()->user()->patient->address }}</textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone">Patient Phone</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('phone') ?? auth()->user()->phone }}" id="phone"
                                        name="phone">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-info d-inline">Edit</button>
                            </form>

                        </div>
                    </div>

                    <div class="d-none show_me col-12 mb-3">
                        <div class="member">
                            <form method="post" action="{{ route('update_password') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group mb-3">
                                    <label for="password">Change Your Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Your new password ...">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password"
                                        name="password_confirmation" placeholder="Enter password again ...">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-info d-inline">Upload</button>
                            </form>

                        </div>
                    </div>

                    <div class="d-none examinations_table">

                        <div class="section-title">
                            <h4>Examinations</h4>
                        </div>

                        <div class=" col-12 mb-3">
                            <div class="member">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10px">#</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Offer</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (auth()->user()->patient->examinations as $examination)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $examination->title }}</td>
                                                <td class="text-center">{{ $examination->description }}</td>
                                                <td class="text-center">{{ $examination->time }}</td>
                                                <td class="text-center">{{ $examination->price }}</td>
                                                <td class="text-center">{{ $examination->offer }}</td>
                                                <td class="text-center">{{ $examination->status }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Doctors Section -->


    </main><!-- End #main -->
    <script>
        update_info = document.querySelector('.update_info')
        show_me = document.querySelectorAll('div.show_me')
        update_info.addEventListener('click', function() {
            show_me.forEach(element => {
                if (element.classList.contains('d-none')) {
                    element.classList.remove('d-none');
                } else {
                    element.classList.add('d-none');

                }
            });
        })
        examinations = document.querySelector('.examinations')
        examinations_table = document.querySelector('.examinations_table')
        examinations.addEventListener('click', function() {
            if (examinations_table.classList.contains('d-none')) {
                examinations_table.classList.remove('d-none');
            } else {
                examinations_table.classList.add('d-none');
            }
        })
    </script>
    @include('end_user.partials.footer')
    @include('end_user.partials.scripts')
</body>

</html>
