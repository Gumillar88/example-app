@extends('layouts.app')

@section('content')
<h2>Create Bank</h2>
<form action="{{ route('banks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Bank Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="code" class="form-label">Bank Code</label>
        <input type="text" name="code" id="code" class="form-control" required>
    </div>
    <a href="{{ route('banks.index') }}" class="btn btn-info">back</a>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection