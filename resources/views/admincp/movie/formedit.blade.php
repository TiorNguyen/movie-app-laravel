@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('movie.update',$movie->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PUT')
                        <div class="form-group">
                            <label for="tittle">Tittle</label>
                            <input type="text" name="tittle" class="form-control" placeholder="..." value="{{ $movie->tittle }}">
                        </div>
                        <div class="form-group">
                            <label for="tittle">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="..." value="">{{ $movie->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="" class="form-control">
                               @if ($movie->status == 1)
                                <option value="1">Hiển thị</option>
                                <option value="2">Không hiển thị</option>
                               @else
                                <option value="2">Không hiển thị</option>
                                <option value="1">Hiển thị</option>
                               @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Ten danh muc</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($category as $cate)
                                    <option value="{{ $cate->id }}" {{ $cate->id == $movie->category->id ? 'selected' : ''}}>{{ $cate->tittle }}</option>
                                @endforeach
                                
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="genre_id">The loai</label>
                            <select name="genres_id" id="" class="form-control">
                                @foreach ($genre as $gen)
                                    <option value="{{ $gen->id }}" {{ $gen->id == $movie->genre->id ? 'selected' : ''}}>{{ $gen->tittle }}</option>
                                @endforeach
                                
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="" class="form-control">
                            <img src="{{ asset('uploads/movie/'.$movie->image) }}" alt="" width="40%">
                        </div>
                        <div class="form-group">
                            <label for="linkphim">Link phim</label>
                            <input type="text" name="linkphim" class="form-control" placeholder="..." value="{{ $movie->linkphim }}">
                        </div>
                        <input class="btn btn-success" value="Edit" type="submit">
                    </form>

                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
