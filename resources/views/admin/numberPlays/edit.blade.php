@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.numberPlay.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.number-plays.update", [$numberPlay->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.numberPlay.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $numberPlay->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.numberPlay.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_id">{{ trans('cruds.numberPlay.fields.number') }}</label>
                <select class="form-control select2 {{ $errors->has('number') ? 'is-invalid' : '' }}" name="number_id" id="number_id" required>
                    @foreach($numbers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('number_id') ? old('number_id') : $numberPlay->number->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.numberPlay.fields.number_helper') }}</span>
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