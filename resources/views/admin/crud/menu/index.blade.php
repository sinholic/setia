@extends('admin.crud.lists')
@section('handlebars')
<script id="details-template" type="text/x-handlebars-template">
    <div class="label label-info">@{{ nama }}</div>
    <table class="table details-table" id="detail-@{{id}}">
        <thead>
        <tr>
            <th>No</th>
            <th>Label</th>
            <th>Group Menu</th>
            <th>URL</th>
            <th>Link External</th>
            <th>Public</th>
            <th>Show On Sidebar</th>
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
            { data: 'label', name: 'label' },
            { data: 'nama', name: 'nama' },
            { data: 'url', name: 'url' },
            { data: 'is_frame', name: 'is_frame' },
            { data: 'is_public', name: 'is_public' },
            { data: 'sidebar', name: 'sidebar' },

        ]
    })
}
</script>
@endsection
