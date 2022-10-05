@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="order_no">{{ trans('cruds.order.fields.order_no') }}</label>
                <input class="form-control {{ $errors->has('order_no') ? 'is-invalid' : '' }}" type="text" name="order_no" id="order_no" value="{{ old('order_no', '') }}" required>
                @if($errors->has('order_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_name">{{ trans('cruds.order.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{ old('client_name', '') }}" required>
                @if($errors->has('client_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_phone">{{ trans('cruds.order.fields.client_phone') }}</label>
                <input class="form-control {{ $errors->has('client_phone') ? 'is-invalid' : '' }}" type="text" name="client_phone" id="client_phone" value="{{ old('client_phone', '') }}" required>
                @if($errors->has('client_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.client_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.order.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shipping_address">{{ trans('cruds.order.fields.shipping_address') }}</label>
                <input class="form-control {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" type="text" name="shipping_address" id="shipping_address" value="{{ old('shipping_address', '') }}" required>
                @if($errors->has('shipping_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="notes">{{ trans('cruds.order.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes" required>{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_id">{{ trans('cruds.order.fields.payment') }}</label>
                <select class="form-control select2 {{ $errors->has('payment') ? 'is-invalid' : '' }}" name="payment_id" id="payment_id">
                    @foreach($payments as $id => $entry)
                        <option value="{{ $id }}" {{ old('payment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_id">{{ trans('cruds.order.fields.shipping') }}</label>
                <select class="form-control select2 {{ $errors->has('shipping') ? 'is-invalid' : '' }}" name="shipping_id" id="shipping_id">
                    @foreach($shippings as $id => $entry)
                        <option value="{{ $id }}" {{ old('shipping_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('shipping'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.order.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="1" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Prnding') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
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