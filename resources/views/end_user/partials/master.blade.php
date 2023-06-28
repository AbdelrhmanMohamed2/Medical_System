<!DOCTYPE html>
<html lang="en">

<head>
    @include('end_user.partials.head')
</head>

<body>
    @include('end_user.partials.header')
    <main id="main">

        @include('end_user.partials.why_us')
        @include('end_user.partials.about')
        @include('end_user.partials.counters')
        @include('end_user.partials.departments')

        @include('end_user.partials.doctors')
        {{-- @include('end_user.partials.contact') --}}
    </main><!-- End #main -->

    @include('end_user.partials.footer')
    @include('end_user.partials.scripts')
</body>

</html>
