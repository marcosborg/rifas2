@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.star.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stars.update", [$star->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.star.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $star->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.star.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $star->start_date) }}" required>
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.star.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $star->end_date) }}" required>
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="donation">{{ trans('cruds.star.fields.donation') }}</label>
                <input class="form-control {{ $errors->has('donation') ? 'is-invalid' : '' }}" type="number" name="donation" id="donation" value="{{ old('donation', $star->donation) }}" step="0.01" required>
                @if($errors->has('donation'))
                    <span class="text-danger">{{ $errors->first('donation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.donation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="limit">{{ trans('cruds.star.fields.limit') }}</label>
                <input class="form-control {{ $errors->has('limit') ? 'is-invalid' : '' }}" type="number" name="limit" id="limit" value="{{ old('limit', $star->limit) }}" step="1" required>
                @if($errors->has('limit'))
                    <span class="text-danger">{{ $errors->first('limit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="award_id">{{ trans('cruds.star.fields.award') }}</label>
                <select class="form-control select2 {{ $errors->has('award') ? 'is-invalid' : '' }}" name="award_id" id="award_id" required>
                    @foreach($awards as $id => $entry)
                        <option value="{{ $id }}" {{ (old('award_id') ? old('award_id') : $star->award->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('award'))
                    <span class="text-danger">{{ $errors->first('award') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.award_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="benefectors">{{ trans('cruds.star.fields.benefectors') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('benefectors') ? 'is-invalid' : '' }}" name="benefectors[]" id="benefectors" multiple required>
                    @foreach($benefectors as $id => $benefector)
                        <option value="{{ $id }}" {{ (in_array($id, old('benefectors', [])) || $star->benefectors->contains($id)) ? 'selected' : '' }}>{{ $benefector }}</option>
                    @endforeach
                </select>
                @if($errors->has('benefectors'))
                    <span class="text-danger">{{ $errors->first('benefectors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.benefectors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="star_1">{{ trans('cruds.star.fields.star_1') }}</label>
                <input class="form-control {{ $errors->has('star_1') ? 'is-invalid' : '' }}" type="number" name="star_1" id="star_1" value="{{ old('star_1', $star->star_1) }}" step="1">
                @if($errors->has('star_1'))
                    <span class="text-danger">{{ $errors->first('star_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.star_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="star_2">{{ trans('cruds.star.fields.star_2') }}</label>
                <input class="form-control {{ $errors->has('star_2') ? 'is-invalid' : '' }}" type="number" name="star_2" id="star_2" value="{{ old('star_2', $star->star_2) }}" step="1">
                @if($errors->has('star_2'))
                    <span class="text-danger">{{ $errors->first('star_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.star.fields.star_2_helper') }}</span>
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