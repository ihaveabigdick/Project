<html>
<h1>
    <form method="post" action="{{URL::to('/submit')}}">
        @csrf
        <input type="text" name="name">
        <button type="submit">Submit Data</button>
    </form>
</h1>
</html>