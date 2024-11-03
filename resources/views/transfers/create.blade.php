@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Transfer</h2>
    <form action="{{ route('transfers.store') }}" method="POST">
        @csrf
        @if(count($errors) > 0)
        <div class="btn btn-danger">{{ $errors->all()[0] }}</div>
        @endif

        <div class="form-group">
            <label for="bank_id">Select Bank:</label>
            <select name="bank_id" id="bank_id" class="form-control" required>
                <option value="">Choose select</option>
                @foreach($banks as $bank)
                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="account_number">Account Number:</label>
            <input type="text" name="account_number" id="account_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="type">Transfer Type:</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">Choose select</option>
                <option value="inhouse">Inhouse</option>
                <option value="transfer-online">transfer Online</option>
            </select>
        </div>

        <div class="form-group">
            <label for="currency">Currency:</label>
            <select name="currency" id="currency" class="form-control" required>
                <option value="">Choose select</option>
                <option value="IDR">IDR</option>
                <option value="USD">USD</option>
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Choose select</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Transfer</button>
    </form>
</div>
@endsection