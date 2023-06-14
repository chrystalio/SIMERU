
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blank Page &mdash; Stisla</title>
    @include('includes.style')
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('components.navbar')
        @include('components.sidebar')
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        @include('components.footer')
    </div>
</div>

@include('includes.script')
</body>
</html>
