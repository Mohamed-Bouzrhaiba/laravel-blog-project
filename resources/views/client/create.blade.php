<h1>add client</h1>

<form  action="{{route('clients.store')}}" method="post">
    @csrf
<input type="text" name="fullname" id="" placeholder="EMP NAME">
<input type="text" name="adresse" id="" placeholder="EMP adresse">
<input type="text" name="tel" id="" placeholder="EMP tel">
<button type="submit">ADD</button>
</form>
