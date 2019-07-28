<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>upload file</title>

    </head>
    <body>
    <form class="" action="{{URL::to("/file")}}" enctype="multipart/form-data" method="post">
        <input type="file" name="image" value="">
        <input type="text" name="_token" value="{{ csrf_token() }}">
        <br>
        <button type="submit" name="button">Upload Image</button>
    </form>
    </body>
</html>