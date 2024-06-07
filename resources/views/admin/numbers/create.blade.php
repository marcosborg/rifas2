@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.number.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.numbers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.number.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.number.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.number.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="donation">{{ trans('cruds.number.fields.donation') }}</label>
                <input class="form-control {{ $errors->has('donation') ? 'is-invalid' : '' }}" type="number" name="donation" id="donation" value="{{ old('donation', '') }}" step="0.01" required>
                @if($errors->has('donation'))
                    <span class="text-danger">{{ $errors->first('donation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.donation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_number">{{ trans('cruds.number.fields.start_number') }}</label>
                <input class="form-control {{ $errors->has('start_number') ? 'is-invalid' : '' }}" type="number" name="start_number" id="start_number" value="{{ old('start_number', '1') }}" step="1" required>
                @if($errors->has('start_number'))
                    <span class="text-danger">{{ $errors->first('start_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.start_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_number">{{ trans('cruds.number.fields.end_number') }}</label>
                <input class="form-control {{ $errors->has('end_number') ? 'is-invalid' : '' }}" type="number" name="end_number" id="end_number" value="{{ old('end_number', '100') }}" step="1" required>
                @if($errors->has('end_number'))
                    <span class="text-danger">{{ $errors->first('end_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.end_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="award_id">{{ trans('cruds.number.fields.award') }}</label>
                <select class="form-control select2 {{ $errors->has('award') ? 'is-invalid' : '' }}" name="award_id" id="award_id" required>
                    @foreach($awards as $id => $entry)
                        <option value="{{ $id }}" {{ old('award_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('award'))
                    <span class="text-danger">{{ $errors->first('award') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.award_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="benefactor_id">{{ trans('cruds.number.fields.benefactor') }}</label>
                <select class="form-control select2 {{ $errors->has('benefactor') ? 'is-invalid' : '' }}" name="benefactor_id" id="benefactor_id" required>
                    @foreach($benefactors as $id => $entry)
                        <option value="{{ $id }}" {{ old('benefactor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('benefactor'))
                    <span class="text-danger">{{ $errors->first('benefactor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.number.fields.benefactor_helper') }}</span>
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