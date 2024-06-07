@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.starPlay.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.star-plays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.starPlay.fields.id') }}
                        </th>
                        <td>
                            {{ $starPlay->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.starPlay.fields.user') }}
                        </th>
                        <td>
                            {{ $starPlay->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.starPlay.fields.star') }}
                        </th>
                        <td>
                            {{ $starPlay->star->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.starPlay.fields.payed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $starPlay->payed ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.starPlay.fields.confirmed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $starPlay->confirmed ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.star-plays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection