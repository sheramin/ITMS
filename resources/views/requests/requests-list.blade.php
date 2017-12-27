@extends('index')

@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>
	<table class="table">
		<thead><th>Requester Name</th><th>Position</th><th>Requested Device</th><th>Quantity</th><th>Description</th><th colspan="2">Options</th></thead>
	@foreach ($requests as $request)
    	<tr id="row{{ $request->id }}">
    		<td>{{$request->requester_name}}</td>
    		<td>{{$request->position}}</td>
    		<td>{{$request->item_name}}</td>
    		<td>{{$request->quantity}}</td>
    		<td>{{$request->description}}</td>
            <td> <span class="fa fa-check" title="markup as done!"></span> </td>
    		<td> <span class="fa fa-trash" id="{{ $request->id }}" title="Delete"></span> </td>
                <!-- {!! route('delete.request', ['id' => $request->id]) !!} -->
    		<td> <span class="fa fa-list" title="More details"></span> </td>
    	</tr>
	@endforeach
	</table>
	<button class="btn btn-danger" onclick="history.go(-1)">Back</button>
<script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("body").on("click", ".fa-trash", function () {
        var id = $(this).attr('id');
       swal({
            title: "Are you sure", 
                text: "Are you sure that you want to delete this record?", 
                type: "question",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Yes, delete it!",
                confirmButtonColor: "#ec6c62"
       }).then(function(result){
            $.ajax({
                type: "GET",
                url: "/requests/delete/"+id,
                // data:{id: 101,'_token': $('input[name=_token]').val()},
                success: function (data) {
                    if(data.status == 'success'){
                        $("#row"+id).closest('tr').remove();
                    }
                    swal("Delete Response:", data.response, data.status);
                }
            });
       });

     });

    $("body").on("click", ".fa-check", function () {
       swal({
            title: "Are you sure?", 
                text: "Are you sure that it's done!", 
                type: "question",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Yes, done!"
                // confirmButtonColor: "#ec6c62"
       }, function() {
         swal("Deleted!", "messge here", "success");
       });

     });
  });

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>

@endsection

