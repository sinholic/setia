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
            @yield('content_input')
                <div class="form-group row">
                    {{ Form::hidden('created_by', Auth::user()->id) }}
                    {{ Form::hidden('updated_by', Auth::user()->id) }}
                    <div class="col-sm-4 offset-sm-3">
                        {{ link_to(url()->previous(), 'Cancel', ['class' => 'btn btn-secondary']) }}
                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
