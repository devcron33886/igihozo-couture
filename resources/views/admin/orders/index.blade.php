@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.order.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.order_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.client_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.client_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.shipping_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.payment') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.shipping') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                {{ $order->order_no ?? '' }}
                            </td>
                            <td>
                                {{ $order->client_name ?? '' }}
                            </td>
                            <td>
                                {{ $order->client_phone ?? '' }}
                            </td>
                            <td>
                                {{ $order->shipping_address ?? '' }}
                            </td>
                            <td>
                                {{ $order->payment->name ?? '' }}
                            </td>
                            <td>
                                {{ $order->shipping->title ?? '' }}
                            </td>
                            <td>
                                {{ $order->total ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Order::STATUS_SELECT[$order->status] ?? '' }}
                            </td>
                            <td>

                                @can('order_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.orders.edit', $order->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection