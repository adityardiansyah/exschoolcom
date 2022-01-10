@extends('master')
@section('title', 'Edit Profile - EX - SCHOOL')

@section('content')
<div class="container top64">
	<div class="row">
		<div class="bg-white" style="padding: 32px; margin-top: 32px;">
		<h2>Edit Avatar</h2>
		<div class="row">
				<img src="{{ url('storage/'.$user->avatar) }}" alt="{{ Auth::user()->name }}" style="display: block; margin-left: auto; margin-right: auto; width: 20%; height:auto;">
			<div class="">
				<form enctype="multipart/form-data" action="{{ url('dashboard/profile') }}" method="post">
					<br>
			        <label>Ubah foto profile</label>
			        <input type="file" name="avatar" class="form-control dropify">
			        <input type="hidden" name="_token" value="{{ csrf_token() }}">
			        <input type="submit" class="pull-right btn btn-sm btn-primary" value="Ubah">
			      </form>
			</div>
		</div>
		</div>
	</div>
</div>