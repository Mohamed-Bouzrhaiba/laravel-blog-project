<h1 align="center">Employees Management System</h1>
<table border="1" align="center">
    <thead><th>ID</th>
            <th>name</th>
            <th>salary</th>
            <th>action</th>
    </thead>
    <tbody>@foreach ($emps as $emp )

        <td>{{$emp->id}}</td>
        <td>{{$emp->name}}</td>
        <td>{{$emp->salary}} $</td>
        <td>
            <form action="{{route("employees.edit",$emp->id)}}" method="get">
                @csrf
                <button>edit</button>
            </form>

            <form action="{{route("employees.destroy",$emp->id)}}" method="POST">
                @method("delete")
                @csrf
                <button>delete</button>
            </form>

        </td>
    </tbody>
    @endforeach
</table>
<a href="{{route('employees.create')}}">ADD NEW EMPLOYEE</a>
