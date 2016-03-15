<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog demo</title>
</head>
<body>
@section('sidebar')
    <p>This is the master sidebar above the content.</p>
@show
@yield('content')
@section('bottom')
    <p>This is bottom text</p>
@show
@section('no-display')
    <p>This section will not be displayed because
        it is using endsection but there is no show or yeild
        statement for this section
    </p>
@endsection
</body>
</html>