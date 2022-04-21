@extends('admin.layout.base')

@section('title')
    Portfolio
@endsection

@section('content')


<div class="row purchace-popup">
	<div class="col-12">
	  <a class="btn btn-primary" href="{{route('portfolio.create')}}">Data Baru</a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Portfolio</h4>
	      <div class="card-description"></div>
	      <div class="table-responsive">
	        <table class="table table-small table-striped table-hover dt">
	          <thead>
	           	<tr>
	           		<th>No</th>
	           		<th>Tag</th>
	           		<th>Nama Project</th>
	           		<th>SS</th>
	           		<th>Tgl. Post</th>
	           		<th>Tgl. Update</th>
	           		<th>#</th>
	           	</tr>
	          </thead>
	          <tbody>

	          	@if($data->count())
	          		@php
	          			$no = 1;
	          		@endphp

                    @foreach($data as $r)
                        <tr>
                        	<td>{{$no}}</td>
                            <td>{{$r->tag->tag_name}}</td>
                            <td>{{$r->project_name}}</td>
                            <td>
                            	<a href="https://res.cloudinary.com/dwqajbup3/image/upload/v1563358183/{{$r->clouder_id}}" data-fancybox="{{$r->id}}" style="text-decoration: none;">
                            		<img class="img-thumbnail" src="https://res.cloudinary.com/dwqajbup3/image/upload/q_auto:low/v1563358183/{{$r->clouder_id}}" alt="">
                            	</a>

                            	@foreach($r->gallery as $gallery)
                            		<a data-fancybox="{{$gallery->portfolio_id}}" href="https://res.cloudinary.com/dwqajbup3/image/upload/v1563358183/{{$gallery->clouder_id}}" style="display: none;">
                            	@endforeach
                            </td>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->created_at)->format('d/m/Y H:i:s')}}</td>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->updated_at)->format('d/m/Y H:i:s')}}</td>
                            <td>
                            	<a href="{{route('portfolio.edit', $r)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{route('portfolio.destroy', $r)}}" method="POST" style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-xs btn-danger btn-del text-center" type="submit">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @php
                        	$no++;
                        @endphp
                    @endforeach
	          	@endif

	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
</div>

@endsection
