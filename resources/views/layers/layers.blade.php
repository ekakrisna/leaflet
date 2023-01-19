@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Outlet)
            <a href="{{ route('layers.create') }}" class="btn btn-success">{{ __('outlet.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('outlet.list') }} <small>{{ __('app.total') }} : {{ $layers->total() }} {{ __('outlet.outlet') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">{{ __('outlet.search') }}</label>
                        <input placeholder="{{ __('outlet.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('outlet.search') }}" class="btn btn-secondary">
                    <a href="{{ route('layers.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('layer.name') }}</th>
                        <th>{{ __('layer.comment') }}</th>
                        <th>{{ __('layer.init_date') }}</th>
                        <th>{{ __('layer.end_date') }}</th>
                        <th class="text-center">{{ __('layer.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($layers as $key => $layer)
                    <tr>
                        <td class="text-center">{{ $layers->firstItem() + $key }}</td>
                        <td>{!! $layer->name !!}</td>
                        <td>{{ $layer->comment }}</td>
                        <td>{{ $layer->init_date }}</td>
                        <td>{{ $layer->end_date }}</td>
                        <td class="text-center">
                            <a href="{{ route('layers.show', $layer) }}" id="show-layer-{{ $layer->id }}">{{ __('app.show') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $layers->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
