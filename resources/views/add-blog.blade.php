<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>Add a New Blog Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        label {
            text-align: center;
            width: 100%;
        }
        .button--wrapper{
            text-align: center;
        }
        .btn-destructive{
            background-color:  #F2C452;
            border-color: #F2C452;
        }
        .btn-primary {
            background-color: #3AB593;
            border-color: #3AB593;
        }

        .card-header{
            background-color: #E9E8E0;
        }
        body {
            color: #11271F;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Add a New Blog Post
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/saveblog">
                @csrf
                <div class="form-group">
                    <label for="title--blog">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="title--blog">Content</label>
                    <textarea type="text" id="body" name="body" class="form-control" value="{{$blog->body}}" required=""></textarea>
                </div>
                <div class="button--wrapper">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
