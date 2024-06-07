@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.award.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.awards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.award.fields.id') }}
                        </th>
                        <td>
                            {{ $award->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.award.fields.name') }}
                        </th>
                        <td>
                            {{ $award->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.award.fields.credits') }}
                        </th>
                        <td>
                            {{ $award->credits }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.award.fields.photo') }}
                        </th>
                        <td>
                            @if($award->photo)
                                <a href="{{ $award->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $award->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.award.fields.description') }}
                        </th>
                        <td>
                            {!! $award->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.awards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection