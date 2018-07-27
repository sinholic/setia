@extends('admin.crud.lists')
@section('handlebars')
<script id="details-template" type="text/x-handlebars-template">
    <div class="label label-info">@{{ nama }}</div>
    <table class="table details-table" id="detail-@{{id}}">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
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
            { data: 'nama', name: 'nama' },
            { data: 'is_show_on_sidebar', name: 'is_show_on_sidebar' },

        ]
    })
}
</script>
@endsection
