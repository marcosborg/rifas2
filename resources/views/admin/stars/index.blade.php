@extends('layouts.admin')
@section('content')
@can('star_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.stars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.star.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.star.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Star">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.star.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.donation') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.limit') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.award') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.benefectors') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.star_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.star.fields.star_2') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('star_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.stars.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.stars.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'donation', name: 'donation' },
{ data: 'limit', name: 'limit' },
{ data: 'award_name', name: 'award.name' },
{ data: 'benefectors', name: 'benefectors.name' },
{ data: 'star_1', name: 'star_1' },
{ data: 'star_2', name: 'star_2' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Star').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection