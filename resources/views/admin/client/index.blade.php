@extends('admin.layout.base')

@section('title')
    Client
@endsection

@section('content')

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Client</h4>
	      <div class="card-description"></div>
	      <div class="table-responsive">
	        <table class="table table-small table-striped table-hover dt">
	          <thead>
	           	<tr>
	           		<th>No</th>
	           		<th>Phone</th>
					<th>IP</th>
	           		<th>Tgl. Post</th>
	           		<th>Tgl. Update</th>
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
                            <td>{{$r->phone}}</td>
                            <td>{{$r->ip}}</td>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->created_at)->format('d/m/Y H:i:s')}}</td>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->updated_at)->format('d/m/Y H:i:s')}}</td>
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
