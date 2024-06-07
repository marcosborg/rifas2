@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.numberPlay.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.number-plays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.numberPlay.fields.id') }}
                        </th>
                        <td>
                            {{ $numberPlay->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.numberPlay.fields.user') }}
                        </th>
                        <td>
                            {{ $numberPlay->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.numberPlay.fields.number') }}
                        </th>
                        <td>
                            {{ $numberPlay->number->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.number-plays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection