<html>

<head>
    <title>Športni urnik</title>
</head>

<body>

@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif

<div class=" container">
    @yield('content')
</div>

</body>

</html>
