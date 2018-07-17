@extends('admin.main')
@section('content')
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
            @if ($message = Session::get('message'))
                <div class="alert alert-success" role="alert">
                    <p class="mb-0">{{ $message }}</p>
                </div>
            @endif
            {!! $dataTable->table() !!}
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
