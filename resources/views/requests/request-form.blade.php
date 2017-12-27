<link rel="stylesheet" href="{!! asset('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
<meta name="_token" content="{!! csrf_token() !!}"/>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
	<div class="col-md-8">
		<h3>Request for new device</h3>
		<form action="{{ route('submit.request') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="requester_name" class="form-control" placeholder="Your full name">
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<input type="text" name="position" class="form-control" placeholder="Position">
			</div>
			<div class="form-group">
				<input type="text" name="device_name" class="form-control" placeholder="Device Name">
			</div>
			<div class="form-group">
				<input type="number" name="quantity" class="form-control" placeholder="Quantity">
			</div>
			<div class="form-group">
				<input type="text" name="usage" class="form-control" placeholder="Usage">
			</div>
			<div class="form-group">
				<textarea name="description" placeholder="Description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" value="Submit">
				<button type="button" class="btn btn-primary">Help me!</button>
			</div>
		</form>
	</div>
</div>

<script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
<script src="{!! asset('bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>

<link rel="stylesheet" type="text/css" href="{!! asset('sweetalert2/dist/sweetalert2.min.css') !!}">
<script type="text/javascript" src="{!! asset('sweetalert2/dist/sweetalert2.min.js') !!}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("body").on("click", ".btn-primary", function () {
	       swal.setDefaults({
			  input: 'text',
			  confirmButtonText: 'Next &rarr;',
			  showCancelButton: true,
			  progressSteps: ['1', '2', '3']
			})

			var steps = [
			  {
			    title: 'Your email:',
			    text: 'Please type your official email below:'
			  },
			  {
			    title: 'Your problem:',
			    text: 'Please describe a bit:'
			  }
			]

			swal.queue(steps).then((result) => {
				let email_addr = JSON.stringify(result.value[0]);
				let msg = JSON.stringify(result.value[1]);
			  swal.resetDefaults()

			  if (result.value) {
			    swal({
			      title: 'About to send',
			      html: 'Your Problem: <pre>' + msg + '</pre>',
			      confirmButtonText: 'SEND'
			    }).then(function (result) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('submit.help_request') }}",
                        data:{email: email_addr, message: msg, '_token': $('input[name=_token]').val()},
                        success: function (data) {
                            swal("IT Response:", data.response , data.status);
                        }
                    });
                });
			  }
			});

	     });
	  });
</script>
