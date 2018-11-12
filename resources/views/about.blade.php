<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form class="form-group" method="post" action="{{ url('/upload') }}"  enctype="multipart/form-data">
    @csrf
      <label for="">Upload file</label>
      <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="fileHelpId">
        <input type="submit" value="Upload" name="submit">
       
    </form>
</body>
</html>