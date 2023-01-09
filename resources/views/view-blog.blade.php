<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>Display All Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h2{
            text-align: center;
        }
        .top-section--car {
            text-align: center;
            padding-top: 0.5rem;
        }
        .top-section--car > .lead {
            padding: 0 0.3rem;
            flex-basis: 1;
        }

        .middle-section--car {
            text-align: center;
            padding-bottom: 1rem;
            display: flex;
            width: 100%;
            justify-content: center;


        }
        .middle-section--car > .lead {
            padding: 0 3rem;
        }
        .bottom-section--car {
            text-align: center;
        }
        hr {
            margin: auto 20rem;
        }
        .description {
            border: 1px solid lightgray;
            min-height: 7rem;
            margin: auto 5rem;
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
            {{$blog->title}}
        </div>
        <div class="card-body">
{{--            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">--}}
                @csrf

                <hr>

                <div class="middle-section--car">
                    <span class="lead"><small>{{$blog->likes}} Likes</small></span>
                </div>
                <div class="bottom-section--car">
                    <h3><small>Content</small></h3>
                    <p class="lead description"><small> {{$blog->body}} </small></p>
                </div>
                <form action="/like/{{$blog->id}}" method="get">
                    <button type="submit" class="btn btn-primary">Like</button>
                </form>

        </div>
    </div>
</div>
</body>
</html>
