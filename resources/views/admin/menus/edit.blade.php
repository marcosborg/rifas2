@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.menu.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.menus.update", [$menu->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.menu.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $menu->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.menu.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $menu->link) }}">
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="page_id">{{ trans('cruds.menu.fields.page') }}</label>
                <select class="form-control select2 {{ $errors->has('page') ? 'is-invalid' : '' }}" name="page_id" id="page_id">
                    @foreach($pages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('page_id') ? old('page_id') : $menu->page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('page'))
                    <span class="text-danger">{{ $errors->first('page') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.page_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.menu.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', $menu->position) }}" step="1">
                @if($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection