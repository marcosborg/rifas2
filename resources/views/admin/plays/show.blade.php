@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.play.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.play.fields.id') }}
                        </th>
                        <td>
                            {{ $play->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.play.fields.type') }}
                        </th>
                        <td>
                            {{ $play->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.play.fields.play') }}
                        </th>
                        <td>
                            {{ $play->play }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.play.fields.selection') }}
                        </th>
                        <td>
                            {{ $play->selection }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection