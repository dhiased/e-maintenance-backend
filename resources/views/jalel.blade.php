<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($technologies as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            {{-- <td>

                <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('sharks/' . $value->id) }}">Show this shark</a>

                <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('sharks/' . $value->id . '/edit') }}">Edit this shark</a>

            </td> --}}
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>