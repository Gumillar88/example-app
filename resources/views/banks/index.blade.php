@extends('layouts.app')

@section('content')
<h2>Bank List</h2>
<a href="{{ route('banks.create') }}" class="btn btn-primary mb-3">Create Bank</a>
<a href="{{ route('transfers.index') }}" class="btn btn-info mb-3">List Transfer</a>

<table id="banksTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($banks as $key => $bank)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $bank->name }}</td>
            <td>{{ $bank->code }}</td>
            <td>
                <a href="{{ route('banks.transfers', $bank->id) }}" class="btn btn-info btn-sm">View Transfers</a>
                <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm ms-2"
                        onclick="return confirm('Are you sure you want to delete this bank?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection