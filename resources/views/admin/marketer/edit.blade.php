@extends('admin.layout.base')

@section('title')
    Edit Marketer
@endsection

@section('content')

    <div class="row">
        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Marketer</h4>
                    <form class="forms-sample" action="{{route('marketer.update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
                        @METHOD('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Nama Marketer" value="{{$data->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No. Hp</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" placeholder="No. Telp" value="{{$data->phone}}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update</button>
                        <a href="{{route('marketer.index')}}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
