@extends('admin.layout.base')

@section('title')
    Edit Portfolio
@endsection

@section('content')

    <div class="row">
        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Portfolio</h4>
                    <form class="forms-sample" action="{{route('portfolio.update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
                        @METHOD('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tag</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tag_id" required>
                                    <option value=""> - Pilih Tag - </option>
                                    @foreach($tag as $tag)
                                        @php
                                            $c = ($tag->tag_name == $data->tag->tag_name) ? 'selected':'';
                                        @endphp
                                        <option value="{{$tag->id}}" {{$c}}>{{$tag->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Project</label>
                            <div class="col-sm-10">
                                <input type="text" name="project_name" class="form-control" placeholder="Nama Project" value="{{$data->project_name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Thumbnail</label>
                            <div class="col-sm-10">
                                <div class="row mb-1">
                                    <div class="col-sm-2">
                                        <div class="card-deck">
                                            <div class="card">
                                                <a data-fancybox href="https://res.cloudinary.com/dwqajbup3/image/upload/v1563358183/{{$data->clouder_id}}">
                                                    <img class="card-img-top" src="https://res.cloudinary.com/dwqajbup3/image/upload/q_auto:low/ar_16:9,c_crop/c_fit/v1563358183/{{$data->clouder_id}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="file" name="thumb" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Screen Shot</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    @if($gallery->count())
                                        @foreach($gallery as $gallery)
                                        <div class="col-sm-2 mb-1">
                                            <div class="card-deck">
                                                <div class="card">
                                                    <a data-fancybox="gallery" href="https://res.cloudinary.com/dwqajbup3/image/upload/v1563358183/{{$gallery->clouder_id}}">
                                                        <img class="card-img-top" src="https://res.cloudinary.com/dwqajbup3/image/upload/q_auto:low/ar_16:9,c_crop/c_fit/v1563358183/{{$gallery->clouder_id}}" alt="">
                                                    </a>
                                                    <div class="card-footer text-center">
                                                      <button class="btn btn-xs btn-danger del-img" data-href="{{route('images', ['id' => $gallery->id])}}">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="file" name="ss[]" class="form-control" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update</button>
                        <a href="{{route('portfolio.index')}}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
