@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.win.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.wins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="star_id">{{ trans('cruds.win.fields.star') }}</label>
                <select class="form-control select2 {{ $errors->has('star') ? 'is-invalid' : '' }}" name="star_id" id="star_id" required>
                    @foreach($stars as $id => $entry)
                        <option value="{{ $id }}" {{ old('star_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('star'))
                    <span class="text-danger">{{ $errors->first('star') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.win.fields.star_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="star_play_id">{{ trans('cruds.win.fields.star_play') }}</label>
                <select class="form-control select2 {{ $errors->has('star_play') ? 'is-invalid' : '' }}" name="star_play_id" id="star_play_id" required>
                    @foreach($star_plays as $id => $entry)
                        <option value="{{ $id }}" {{ old('star_play_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('star_play'))
                    <span class="text-danger">{{ $errors->first('star_play') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.win.fields.star_play_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.win.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.win.fields.user_helper') }}</span>
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