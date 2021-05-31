@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Blog') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('blogs.update',$blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="bname" class="col-md-4 col-form-label text-md-right">{{ __('Blog Name') }}</label>

                            <div class="col-md-6">
                                <input id="bname" type="text" class="form-control @error('bname') is-invalid @enderror" name="bname" value="{{ $blog->blog_Name }}" required autocomplete="bname" autofocus>

                                @error('bname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bdesc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="bdesc" class="form-control @error('bdesc') is-invalid @enderror" name="bdesc" required autocomplete="bdesc" autofocus>{{ $blog->blog_Description }}</textarea>
                                @error('bdesc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bstart_date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>
                            <div class="col-md-6">
                                <input id="bstart_date" type="text" class="form-control @error('bstart_date') is-invalid @enderror" name="bstart_date" value="{{ $blog->start_Date }}" required autocomplete="bstart_date" placeholder="YYYY-MM-DD" >
                                @error('bstart_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bend_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>
                            <div class="col-md-6">
                                <input id="bend_date" type="text" class="form-control @error('bend_date') is-invalid @enderror" name="bend_date" value="{{ $blog->end_Date }}" required autocomplete="bend_date" placeholder="YYYY-MM-DD">
                                @error('bend_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Is Active') }}</label>
                            <div class="col-md-6">
                                <input id="active" type="checkbox" class="form-control @error('active') is-invalid @enderror" name="active"  value="1" autocomplete="active" {{ ($blog->is_Active == '1') ? 'checked' : ''  }} >
                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Blog') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection