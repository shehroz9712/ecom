@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.transactions.index') }}
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <a href="{{ route('admin.transaction.create') }}" class="btn btn-primary">Add tour</a>
                    </div> --}}

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Admin Comments</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->agent?->name }}</td>
                                            <td>{{ $transaction->transaction_type }}</td>
                                            <td>${{ number_format($transaction->amount, 2) }}</td>
                                            <td>{{ $transaction->admin_comments }}</td>
                                            <td>
                                                @if ($transaction->status == 'pending')
                                                    <a href="{{ route('admin.credit_transactions.approve', encrypt($transaction->id)) }}"
                                                        class="btn btn-info btn-sm">Approve</a>
                                                @else
                                                    Approved
                                                @endif


                                                {{-- <td>
                                                <a href="{{ route('admin.credit_transactions.show', $transaction->id) }}"
                                                   ><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.credit_transactions.edit', $transaction->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form
                                                    action="{{ route('admin.credit_transactions.destroy', $transaction->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Delete transaction?')">Delete</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('js')
@endsection
