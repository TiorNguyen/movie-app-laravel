@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <form action="{{ route('genre.update',$genre->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PUT')
                        <div class="form-group">
                            <label for="tittle">Tittle</label>
                            <input type="text" name="tittle" class="form-control" placeholder="..." value="{{ $genre->tittle }}">
                        </div>
                        <div class="form-group">
                            <label for="tittle">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"  value="">{{ $genre->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="" class="form-control">
                                @if ($genre->status == 1)
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                @else
                                    <option value="2">Không hiển thị</option>
                                    <option value="1">Hiển thị</option>
                                @endif
                            </select>
                        </div>
                        <input class="btn btn-success" value="Update" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
