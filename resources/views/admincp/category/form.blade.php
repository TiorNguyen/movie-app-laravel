@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('category.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="tittle">Tittle</label>
                            <input type="text" name="tittle" class="form-control" placeholder="..." value="">
                        </div>
                        <div class="form-group">
                            <label for="tittle">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="..." value=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="2">Không hiển thị</option>
                            </select>
                        </div>
                        <input class="btn btn-success" value="Add" type="submit">
                    </form>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tittle</th>
                            {{-- <th scope="col">Description</th> --}}
                            <th scope="col">Status</th>
                            <th scope="col">Manage</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item )
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->tittle }}</td>
                                    {{-- <td>{{ $item->description }}</td> --}}
                                    <td>
                                        @if ($item->status == 1)
                                            Hiển thị
                                        @else
                                            Không hiển thị
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('category.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="" id="" class="btn btn-danger" value="Delete">
                                        </form>
                                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                                    </td>

                                </tr>
                            @endforeach
                            
                          
                        </tbody>
                      </table>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
