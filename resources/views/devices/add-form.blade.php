@extends('index')

@section('content')
	<div class="col-md-8">
		<h3>Add new device</h3>
		<form action="{{ route('submit.new.device') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="device_name" class="form-control" required="" placeholder="Device Name">
			</div>
			<div class="form-group">
				<input type="text" name="serial_no" class="form-control" placeholder="Serial No.">
			</div>
			<div class="form-group">
				<input type="text" name="office_serial_no" class="form-control" required="" placeholder="Office serial No.">
			</div>
			<div class="form-group">
				<input type="text" name="specification" class="form-control" placeholder="Specification">
			</div>
			<div class="form-group">
				<input type="number" name="cost" class="form-control" placeholder="Cost">
			</div>
			<div class="form-group">
				<input type="date" name="purchase_date" class="form-control" placeholder="Purchase Date">
			</div>
			<div class="form-group">
				<input type="number" name="quantity" class="form-control" required="" placeholder="Quantity">
			</div>
			<div class="form-group">
				<select name="status" class="form-control">
					<option value="excellent">Full functioning</option>
					<option value="good">Good</option>
					<option value="fair">Fair</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="company_name" class="form-control" placeholder="Compnay Name">
			</div>
			<div class="form-group">
				<input type="text" name="company_contact" class="form-control" placeholder="Company Contact">
			</div>
			<div class="form-group">
				<textarea name="description" placeholder="Description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" value="Submit">
				<a href="{{ route('list.devices') }}" class="btn btn-primary">List Devices</a>
			</div>
		</form>
	</div>
@endsection