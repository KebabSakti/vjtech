@extends('admin.layout.base')

@section('content')

    <div class="row">
        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Portfolio</h4>
                    <form class="forms-sample" action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tag</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tag_id" required>
                                    <option value=""> - Pilih Tag - </option>
                                    @if($tag->count())
                                        @foreach($tag as $tag)
                                            <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Project</label>
                            <div class="col-sm-10">
                                <input type="text" name="project_name" class="form-control" placeholder="Nama Project" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Thumbnail</label>
                            <div class="col-sm-10">
                                <input type="file" name="thumb" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Screen Shot</label>
                            <div class="col-sm-10">
                                <input type="file" name="ss[]" class="form-control" multiple required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <a href="{{route('portfolio.index')}}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
