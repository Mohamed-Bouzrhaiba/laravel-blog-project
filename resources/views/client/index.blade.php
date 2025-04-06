<h1 align="center">client Management System</h1>
<table border="1" align="center">
    <thead><th>ID</th>
            <th>name</th>
            <th>adresse</th>
            <th>tel</th>
            <th>action</th>
    </thead>
    <tbody>@foreach ($clients as $client )

        <td>{{$client->id}}</td>
        <td>{{$client->fullname}}</td>
        <td>{{$client->adresse}} </td>
        <td>{{$client->tel}} </td>
        <td>
            <form action="{{route("clients.edit",$client->id)}}" method="get">
                @csrf
                <button>edit</button>
            </form>

            <form action="{{route("clients.destroy",$client->id)}}" method="POST">
                @method("delete")
                @csrf
                <button>delete</button>
            </form>

        </td>
    </tbody>
    @endforeach
</table>
<a href="{{route('clients.create')}}">ADD NEW client</a>
