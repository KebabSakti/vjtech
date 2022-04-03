@extends('admin.layout.base')

@section('title')
    Marketer
@endsection

@section('content')


<div class="row purchace-popup">
	<div class="col-12">
	  <a class="btn btn-primary" href="{{route('marketer.create')}}">Data Baru</a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Marketer</h4>
	      <div class="card-description"></div>
	      <div class="table-responsive">
	        <table class="table table-small table-striped table-hover dt">
	          <thead>
	           	<tr>
	           		<th>No</th>
	           		<th>Nama</th>
					<th>No. Hp</th>
					<th>Link</th>
					<th>Referral</th>
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
                            <td>{{$r->name}}</td>
                            <td>{{$r->phone}}</td>
							<td><a href="https://vjtechsolution.com/referral/{{$r->phone}}" target="_blank">https://vjtechsolution.com/referral/{{$r->phone}}</a></td>
							<td>{{$r->referrals->count()}}</td>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->created_at)->format('d/m/Y H:i:s')}}</td>
                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r->updated_at)->format('d/m/Y H:i:s')}}</td>
                            <td>
                            	<a href="{{route('marketer.edit', ['id' => $r['id']])}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{route('marketer.destroy', ['id' => $r['id']])}}" method="POST" style="display: inline-block;">
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
