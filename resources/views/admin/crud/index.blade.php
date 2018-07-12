@extends('admin.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $title }}
                    </h3>
                </div>
                <div class="card-body">
                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                @foreach(json_decode($columns) as $column)
                                    <th> {{ $column->data }} </th>
                                @endforeach
                            </tr>
                        </thead>

                    </table>
                    <a href="{{ url()->current() }}/create">Add new {{ $title }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(function() {
    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! $url !!}',
        columns: {!! $columns !!}
    });
});
</script>
@endpush
