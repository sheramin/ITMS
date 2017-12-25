@extends('index')

@section('content')
	<table class="table">
		<thead><th>Requester Name</th><th>Position</th><th>Requested Device</th><th>Quantity</th><th>Description</th><th colspan="2">Options</th></thead>
	@foreach ($requests as $request)
    	<tr>
    		<td>{{$request->requester_name}}</td>
    		<td>{{$request->position}}</td>
    		<td>{{$request->item_name}}</td>
    		<td>{{$request->quantity}}</td>
    		<td>{{$request->description}}</td>
            <td> <span class="fa fa-check" title="markup as done!"></span> </td>
    		<td> <a href="#" class="fa fa-trash" title="Delete"></a> </td>
    		<td> <span class="fa fa-list" title="More details"></span> </td>
    	</tr>
	@endforeach
	</table>
	<button class="btn btn-danger" onclick="history.go(-1)">Back</button>
@endsection
