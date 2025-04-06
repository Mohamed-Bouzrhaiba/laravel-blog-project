<h1>add emp</h1>

<form  action="{{route('employees.store')}}" method="post">
    @csrf
<input type="text" name="name" id="" placeholder="EMP NAME">
<input type="text" name="salary" id="" placeholder="EMP SALARY">
<button type="submit">ADD</button>
</form>
