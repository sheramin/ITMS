@extends('index')

@section('content')
	<table class="table">
		<thead><th>Name</th><th>Serial No.</th><th>Office Serial No.</th><th>Quantity</th><th>Available</th><th>Status</th><th>Description</th><th colspan="3">Options</th></thead>
	@foreach ($devices as $device)
    	<tr>
    		<td>{{$device->name}}</td>
    		<td>{{$device->serial_no}}</td>
    		<td>{{$device->office_serial_no}}</td>
    		<td>{{$device->quantity}}</td>
    		<td>0</td>
    		<td>{{$device->status}}</td>
    		<td>{{$device->description}}</td>
    		<td> <a href="{!! route('edit', ['id' => $device->id]) !!}" class="fa fa-edit" ></a></td>
    		<td> <a href="#" class="fa fa-trash" title="Delete"></a> </td>
    		<!-- {!! route('delete', ['id' => $device->id]) !!} -->
    		<td> <span class="fa fa-list" title="More details"></span> </td>
    	</tr>
	@endforeach
	</table>
	<button class="btn btn-danger" onclick="history.go(-1)">Back</button>
	<a href="{{ route('add.new.form') }}" class="btn btn-success">Add new Device</a>

@endsection
