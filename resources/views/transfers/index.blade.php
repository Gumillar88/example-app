@extends('layouts.app')

@section('content')
<h2>All Transfers</h2>
<a href="{{ route('banks.index') }}" class="btn btn-info mb-3">List bank</a>
<a href="{{ route('transfers.create') }}" class="btn btn-primary mb-3">Create Transfer</a>
<table id="transfersTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Name Bank</th>
            <th>Account Number</th>
            <th>Amount</th>
            <th>Currency</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transfers as $key => $transfer)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $_getBank[$transfer->bank_id] }}</td>
            <td>{{ $transfer->account_number }}</td>
            <td>{{ $transfer->amount }}</td>
            <td>{{ $transfer->currency }}</td>
            <td>{{ $transfer->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection