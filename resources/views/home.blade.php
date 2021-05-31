@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h2 class="display-20 display-md-18 display-lg-16">My Blogs</h2>
    </div>
    <a href="{{ route('blogs.create')}}" class="btn btn-primary">Add Blog</a>
    <a href="{{ route('blogs.index')}}" class="btn btn-success">Blog List</a>
    <div class="row">
    @foreach($blogs as $blogs_data)
        <div class="col-lg-4 col-md-6 mb-2-6">
            <article class="card card-style2">
                <div class="card-img">
                    <img class="rounded-top" src="https://via.placeholder.com/350x280/6A5ACD/000000" alt="...">
                    <?php /* <img class="rounded-top" src="{{asset('/blog/'.$blogs_data->image)}}" alt="..."> */ ?>
                    <div class="date">{{$blogs_data->start_Date}}</div>
                </div>
                <div class="card-body">
                    <h3 class="h5"><a href="#!">{{ $blogs_data->blog_Name }}</a></h3>
                    <p class="display-30">{{ $blogs_data->blog_Description }}</p>
                    <a href="#!" class="read-more">read more</a>
                </div>
            </article>
        </div>
    @endforeach
    </div>
</div>
@endsection
