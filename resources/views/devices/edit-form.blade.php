@extends('index')

@section('content')
	<div class="col-md-8">
		<h3>Add new device</h3>
		<form action="{{ route('submit.update', ['id' => $device->id]) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="device_name" class="form-control" value="{{$device->name}}" required="" placeholder="Device Name">
			</div>
			<div class="form-group">
				<input type="text" name="serial_no" class="form-control" value="{{$device->serial_no}}" placeholder="Serial No.">
			</div>
			<div class="form-group">
				<input type="text" name="office_serial_no" value="{{$device->office_serial_no}}" class="form-control" required="" placeholder="Office serial No.">
			</div>
			<div class="form-group">
				<input type="text" name="specification" value="{{$device->specification}}" class="form-control" placeholder="Specification">
			</div>
			<div class="form-group">
				<input type="number" name="cost" value="{{$device->cost}}" class="form-control" placeholder="Cost">
			</div>
			<div class="form-group">
				<input type="date" name="purchase_date" value="{{$device->purchase_date}}" class="form-control" placeholder="Purchase Date">
			</div>
			<div class="form-group">
				<input type="number" name="quantity" value="{{$device->quantity}}" class="form-control" required="" placeholder="Quantity">
			</div>
			<div class="form-group">
				<select name="status" class="form-control">
					<option value="excellent">Full functioning</option>
					<option value="good">Good</option>
					<option value="fair">Fair</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="company_name" value="{{$device->company_name}}" class="form-control" placeholder="Compnay Name">
			</div>
			<div class="form-group">
				<input type="text" name="company_contact" value="{{$device->company_contact}}" class="form-control" placeholder="Company Contact">
			</div>
			<div class="form-group">
				<textarea name="description" placeholder="Description" class="form-control">{{$device->description}}</textarea>
			</div>
			<div class="form-group">
				<a href="{{ route('list.devices') }}" class="btn btn-danger">Back</a>
				<input type="submit" class="btn btn-success" value="Update">
			</div>
		</form>
	</div>
@endsection