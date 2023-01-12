<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>Recent Blog Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        form {
            display: inline;
        }
        .add {
            margin-top: 1rem;
            width: 100%;
        }
        .right-side{
            float: right;
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
                Recent Blog Posts
            </div>
            @foreach($blogs as $blog)
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            {{$blog->title}}
                            <small class="text-muted">{{$blog->likes}}♥︎</small>
                        </h3>
                        <div class="button--wrapper">
                            <form action="/edit/{{$blog->id}}" method="get">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            <form action="/delete/{{$blog->id}}" method="get">
                                <button type="submit" class="btn btn-destruction">Delete</button>
                            </form>
                            <form action="/view/{{$blog->id}}" method="get">
                                <button type="submit" class="btn btn-primary right-side">View</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <form action="/blog/add" method="get">
            <button type="submit" class="add btn btn-primary">Add</button>
        </form>
        <div style="padding-bottom: 5rem"></div>
</div>
</body>
</html>
