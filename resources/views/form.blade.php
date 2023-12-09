<html>

<head>
    <title>Email Sending</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
                <form method="POST" action="{{ route('sendEmail') }}" enctype="multipart/form-data">
                    <div class="form-group" align="center">
                        <h2>Send Email</h2>
                    </div>@csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Subject</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Subject Here" name="subject">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Upload File</label>
                        <input type="file" class="form-control" name="excel_file">

                        {{-- <input type="password" id="exampleInputPassword1" placeholder="Password"> --}}
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-info" />
                    </div>
                    {{-- <button type="submit">Upload</button> --}}
                </form>
            </div>
        </div>
    </div>



</body>

</html>
