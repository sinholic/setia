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
@yield('handlebars')
@endsection
@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
{!! $dataTable->scripts() !!}
<script type="text/javascript">
// console.log(Handlebars.compile($("#details-template").html()));
var template = Handlebars.compile($("#details-template").html());
var table = window.LaravelDataTables["dataTableBuilder"];
$('#dataTableBuilder tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row(tr);
    var tableId = 'detail-' + row.data().id;
    console.log(tableId);
    if (row.child.isShown()) {
        // This row is already open - close it
        @if($title == "Telin Tarif")
            $(this).html('<button class="btn btn-sm btn-secondary"><i class="fas fa-plus font-blue" style="cursor: pointer; font-size: 16px;"></i> View Log</button>')
        @else
            $(this).html('<i class="fas fa-plus font-blue" style="cursor: pointer; font-size: 16px;"></i>')
        @endif
        row.child.hide();
        tr.removeClass('shown');
    } else {
        // Open this row
        @if($title == "Telin Tarif")
            $(this).html('<button class="btn btn-sm btn-secondary"><i class="fas fa-minus font-blue" style="cursor: pointer; font-size: 16px;"></i> View Log</button>')
        @else
            $(this).html('<i class="fas fa-minus font-blue" style="cursor: pointer; font-size: 16px;"></i>')
        @endif
        row.child(template(row.data())).show();
        initTable(tableId, row.data());
        tr.addClass('shown');
        tr.next().find('td').addClass('no-padding bg-gray');
    }
});
</script>
@endpush
