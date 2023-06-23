<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livewire Crud App</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/61df0a3319.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body class="antialiased">
<div class="container">
    <div>
        <h1 class="display-6 mt-3 mb-3 text-center fw-bold">All patients</h1>


        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Location</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $key => $patient)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{($patient)->name}}</td>
                    <td>{{$patient->age}}</td>
                    <td>{{$patient->location}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
@livewireScripts
</body>
</html>



