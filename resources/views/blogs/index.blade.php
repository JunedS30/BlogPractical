@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" justify-content-center">
    <div class="col-sm-12">
  <h1 class="display-3">Blogs List</h1>
  <a href="{{ route('blogs.create')}}" class="btn btn-primary">Add Blog</a>
  <a href="{{ route('home')}}" class="btn btn-success">Dashboard</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Description</td>
          <td>Start Date</td>
          <td>End Date</td>
          <td>Active</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
      @if(count($blogs) > 0 )
        @foreach($blogs as $blogs_data)
        <tr>
            <td>{{$blogs_data->id}}</td>
            <td>{{$blogs_data->blog_Name}}</td>
            <td>{{$blogs_data->blog_Description}}</td>
            <td>{{$blogs_data->start_Date}}</td>
            <td>{{$blogs_data->end_Date}}</td>
            <td>{{($blogs_data->is_Active == '1') ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="{{ route('blogs.edit',$blogs_data->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('blogs.destroy', $blogs_data->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      @else
        <tr>
          <td colspan="4">No Blogs</td>
        </tr>
      @endif
    </tbody>
  </table>
<div>
    </div>
</div>
@endsection