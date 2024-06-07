@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.payment.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type">{{ trans('cruds.payment.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', '') }}" required>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="plays_json">{{ trans('cruds.payment.fields.plays_json') }}</label>
                <textarea class="form-control {{ $errors->has('plays_json') ? 'is-invalid' : '' }}" name="plays_json" id="plays_json">{{ old('plays_json') }}</textarea>
                @if($errors->has('plays_json'))
                    <span class="text-danger">{{ $errors->first('plays_json') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.plays_json_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('payed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="payed" value="0">
                    <input class="form-check-input" type="checkbox" name="payed" id="payed" value="1" {{ old('payed', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="payed">{{ trans('cruds.payment.fields.payed') }}</label>
                </div>
                @if($errors->has('payed'))
                    <span class="text-danger">{{ $errors->first('payed') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payed_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="entity_id">{{ trans('cruds.payment.fields.entity') }}</label>
                <select class="form-control select2 {{ $errors->has('entity') ? 'is-invalid' : '' }}" name="entity_id" id="entity_id" required>
                    @foreach($entities as $id => $entry)
                        <option value="{{ $id }}" {{ old('entity_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('entity'))
                    <span class="text-danger">{{ $errors->first('entity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.entity_helper') }}</span>
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