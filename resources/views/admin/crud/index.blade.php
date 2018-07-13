@extends('admin.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <h3>
                                    {{ $title }}
                                </h3>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-caret-left "></i> Back to dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $dataTable->table() !!}
                    <a href="{{ url()->current() }}/create">Add new </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush
