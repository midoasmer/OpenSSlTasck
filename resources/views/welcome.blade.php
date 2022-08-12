<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    </style>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body class="antialiased">
<div class="card" style="width: 50%;margin-left: 25%;margin-top:5%;">
    <h5 class="card-header">Encrypt/Decrypt</h5>
    <div class="card-body">
        <form id="actionForm" action="{{route('encrypt')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Action</label>
                <select class="form-control" id="exampleFormControlSelect1" name="type" required>
                    <option value="1">encrypt</option>
                    <option value="2">decrypt</option>
                </select>
            </div>
            <div class="form-group">
                <label>Select file</label>
                <input type="file" class="form-control-file" id="file" name="file" onchange="getFileData()" required>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>File Name</label><br>
                        <label id="fileName"></label>
                    </div>
                    <div class="col">
                        <label>File Type</label><br>
                        <label id="fileType"></label>
                    </div>
                    <div class="col">
                        <label>File Size In KB</label><br>
                        <label id="fileSize"></label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Go</button>
        </form>
    </div>
</div>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<script>
    function getFileData() {
        var fileName = document.getElementById('file').files[0].name;//get fail name
        var fileSize = document.getElementById('file').files[0].size;//get file size
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);//get file ext
        //show file data to user
        document.getElementById('fileName').innerHTML = fileName;
        document.getElementById('fileType').innerHTML = ext;
        document.getElementById('fileSize').innerHTML = fileSize;
        document.getElementById('fileType').style.color = "red";
        document.getElementById('fileSize').style.color = "red";
        document.getElementById('fileName').style.color = "red";
    }
</script>
</body>
</html>
