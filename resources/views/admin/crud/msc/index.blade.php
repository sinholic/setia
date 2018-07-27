@extends('admin.crud.lists')
@section('handlebars')
<script id="details-template" type="text/x-handlebars-template">
    <div class="label label-info">@{{ nama }}</div>
    <table class="table details-table" id="detail-@{{id}}">
        <thead>
        <tr>
            <th>No</th>
            <th>Recentity</th>
            <th>GT</th>
            <th>MSC Name</th>
            <th>Regional</th>
            <th>Nama Kota</th>
            <th>Filename</th>
            <th>Status</th>
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
            { data: 'no', name: 'no' },
            { data: 'recentity', name: 'recentity' },
            { data: 'gt', name: 'gt' },
            { data: 'nama', name: 'nama' },
            { data: 'regional', name: 'regional' },
            { data: 'namakota', name: 'namakota' },
            { data: 'filename', name: 'filename' },
            { data: 'status', name: 'status' },

        ]
    })
}
</script>
@endsection
