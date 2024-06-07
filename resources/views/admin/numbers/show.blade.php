@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.number.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.numbers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.id') }}
                        </th>
                        <td>
                            {{ $number->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.name') }}
                        </th>
                        <td>
                            {{ $number->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.start_date') }}
                        </th>
                        <td>
                            {{ $number->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.end_date') }}
                        </th>
                        <td>
                            {{ $number->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.donation') }}
                        </th>
                        <td>
                            {{ $number->donation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.start_number') }}
                        </th>
                        <td>
                            {{ $number->start_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.end_number') }}
                        </th>
                        <td>
                            {{ $number->end_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.award') }}
                        </th>
                        <td>
                            {{ $number->award->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.number.fields.benefactor') }}
                        </th>
                        <td>
                            {{ $number->benefactor->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.numbers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection