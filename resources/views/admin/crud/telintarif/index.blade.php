@extends('admin.crud.lists')
@section('handlebars')
<script id="details-template" type="text/x-handlebars-template">
    <div class="label label-info">@{{ nama }} Tarif Log</div>
    <table class="table details-table" id="detail-@{{id}}">
        <thead>
        <tr>
            <th>No</th>
            <th>Tarif</th>
            <th>Tgl Berlaku</th>
        </tr>
        </thead>
    </table>
</script>

<script type="text/javascript">
function initTable(tableId, data) {
    $('#' + tableId).DataTable({
        processing: true,
        serverSide: true,
        ajax: data.details_url,
        columns: [
            { data: 'service.nama', name: 'service.nama' },
            { data: 'unit_service.nama', name: 'unit_service.nama' },
            { data: 'nilai_unit', name: 'nilai_unit' },
            { data: 'nilai_rate', name: 'nilai_rate' },
            { data: 'tgl_berlaku', name: 'tgl_berlaku' }
        ]
    })
}
</script>
@endsection
