@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.play.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.plays.update", [$play->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="type">{{ trans('cruds.play.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="number" name="type" id="type" value="{{ old('type', $play->type) }}" step="1" required>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.play.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="play">{{ trans('cruds.play.fields.play') }}</label>
                <input class="form-control {{ $errors->has('play') ? 'is-invalid' : '' }}" type="number" name="play" id="play" value="{{ old('play', $play->play) }}" step="1" required>
                @if($errors->has('play'))
                    <span class="text-danger">{{ $errors->first('play') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.play.fields.play_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="selection">{{ trans('cruds.play.fields.selection') }}</label>
                <input class="form-control {{ $errors->has('selection') ? 'is-invalid' : '' }}" type="number" name="selection" id="selection" value="{{ old('selection', $play->selection) }}" step="1" required>
                @if($errors->has('selection'))
                    <span class="text-danger">{{ $errors->first('selection') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.play.fields.selection_helper') }}</span>
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