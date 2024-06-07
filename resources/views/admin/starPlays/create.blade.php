@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.starPlay.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.star-plays.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.starPlay.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.starPlay.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="star_id">{{ trans('cruds.starPlay.fields.star') }}</label>
                <select class="form-control select2 {{ $errors->has('star') ? 'is-invalid' : '' }}" name="star_id" id="star_id" required>
                    @foreach($stars as $id => $entry)
                        <option value="{{ $id }}" {{ old('star_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('star'))
                    <span class="text-danger">{{ $errors->first('star') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.starPlay.fields.star_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('payed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="payed" value="0">
                    <input class="form-check-input" type="checkbox" name="payed" id="payed" value="1" {{ old('payed', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="payed">{{ trans('cruds.starPlay.fields.payed') }}</label>
                </div>
                @if($errors->has('payed'))
                    <span class="text-danger">{{ $errors->first('payed') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.starPlay.fields.payed_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('confirmed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="confirmed" value="0">
                    <input class="form-check-input" type="checkbox" name="confirmed" id="confirmed" value="1" {{ old('confirmed', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="confirmed">{{ trans('cruds.starPlay.fields.confirmed') }}</label>
                </div>
                @if($errors->has('confirmed'))
                    <span class="text-danger">{{ $errors->first('confirmed') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.starPlay.fields.confirmed_helper') }}</span>
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