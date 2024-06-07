@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.star.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.id') }}
                        </th>
                        <td>
                            {{ $star->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.name') }}
                        </th>
                        <td>
                            {{ $star->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.start_date') }}
                        </th>
                        <td>
                            {{ $star->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.end_date') }}
                        </th>
                        <td>
                            {{ $star->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.donation') }}
                        </th>
                        <td>
                            {{ $star->donation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.limit') }}
                        </th>
                        <td>
                            {{ $star->limit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.award') }}
                        </th>
                        <td>
                            {{ $star->award->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.benefectors') }}
                        </th>
                        <td>
                            @foreach($star->benefectors as $key => $benefectors)
                                <span class="label label-info">{{ $benefectors->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.star_1') }}
                        </th>
                        <td>
                            {{ $star->star_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.star.fields.star_2') }}
                        </th>
                        <td>
                            {{ $star->star_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection