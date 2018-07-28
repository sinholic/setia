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
            { data: 'kode1', name: 'kode1' },
            { data: 'kode2', name: 'kode2' },
            { data: 'kode3', name: 'kode3' },
            { data: 'nilai', name: 'nilai' },
            { data: 'ymd', name: 'ymd' },
            
        ]
    })
}
</script>
@endsection
