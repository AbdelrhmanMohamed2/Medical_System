<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examination File</title>

    <style>
        .text-success {
            color: #28a745
        }

        .text-primary {
            color: #007bff
        }

        .text-info {
            color: #17a2b8
        }


    </style>
</head>

<body>

    <h1>Medical System</h1>
    <h2>Examination Details</h2>
    <br>
    <br>
    <hr>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-success">Patient name : {{ $patient }}</h3>
            <h3 class="card-title text-primary">Doctor name : {{ $doctor }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <hr>
                    <p class="card-text"><span class="text-info">Title :</span> {{ $title }}</p>
                    <p class="card-text"><span class="text-info">Description :</span>
                        {{ $description }}</p>
                    <p class="card-text"><span class="text-info">Price :</span> {{ $price }}</p>
                    <p class="card-text"><span class="text-info">Offer :</span> {{ $offer }}%</p>
                    <p class="card-text"><span class="text-info">Status :</span> {{ $status }}</p>
                    <p class="card-text"><span class="text-info">Time :</span> {{ $time }}</p>
                </div>
            </div>
        </div>
        <hr>

    </div>
</body>

</html>
