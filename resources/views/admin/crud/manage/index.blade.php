@extends('admin.crud.lists')
@section('handlebars')
<script id="details-template" type="text/x-handlebars-template">
    <div class="label label-info">@{{ nama }} manage</div>
    <table class="table details-table" id="detail-@{{id}}">
        <thead>
        <tr>
            <th>No</th>
            <th>Regional</th>
            <th>manage</th>
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
            { data: 'regional', name: 'regional' },
            { data: 'manage', name: 'manage' },

        ]
    })
}
</script>
@endsection
