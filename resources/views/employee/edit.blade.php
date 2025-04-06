<h1>add emp</h1>

<form  action="{{route('employees.update',$employee->id)}}" method="post">
    @method("put")
    @csrf
<input type="text" name="name" id="" value="{{($employee->name)}}">
<input type="text" name="salary" id="" value="{{($employee->salary)}}">
<button type="submit">update</button>
</form>
