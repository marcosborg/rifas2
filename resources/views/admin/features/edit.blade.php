@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.feature.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.features.update", [$feature->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="page_id">{{ trans('cruds.feature.fields.page') }}</label>
                <select class="form-control select2 {{ $errors->has('page') ? 'is-invalid' : '' }}" name="page_id" id="page_id" required>
                    @foreach($pages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('page_id') ? old('page_id') : $feature->page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('page'))
                    <span class="text-danger">{{ $errors->first('page') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.page_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.feature.fields.placement') }}</label>
                @foreach(App\Models\Feature::PLACEMENT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('placement') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="placement_{{ $key }}" name="placement" value="{{ $key }}" {{ old('placement', $feature->placement) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="placement_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('placement'))
                    <span class="text-danger">{{ $errors->first('placement') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.placement_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.feature.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', $feature->position) }}" step="1">
                @if($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.position_helper') }}</span>
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