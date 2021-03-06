<div class="form-group">
    <label>{{$column['name']}}:</label>
    <div class="input-group">
        <button type="button" class="btn btn-default pull-right" id="{{ $column['field'] }}-daterange-btn">
            <span>{{ request()->input($column['field'].'_min')?request()->input($column['field'].'_min').' - '.request()->input($column['field'].'_max'):'Choose a time period' }}
            </span>
            <i class="fa fa-caret-down"></i>
        </button>
        <input type="hidden" id="{{ $column['field'] }}_min" data-name="{{ $column['field'] }}_min" value="{{ request()->input($column['field'].'_min') }}">
        <input type="hidden" id="{{ $column['field'] }}_max" data-name="{{ $column['field'] }}_max" value="{{ request()->input($column['field'].'_max') }}">
    </div>
</div>
@push('js')
    <script>
        $('#{{ $column['field'] }}-daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                // startDate: moment().subtract(29, 'days'),
                // endDate  : moment()
            },
            function (start, end) {
                {{--$('#{{ $column[\'field'] }} span').html(start.format('YYYY-M-D') + ' - ' + end.format('YYYY-M-D'))--}}
                $('#{{ $column['field'] }}-daterange-btn span').html(start.format('YYYY-M-D') + ' - ' + end.format('YYYY-M-D'));
                $('#{{ $column['field'] }}_min').val(start.format('YYYY-M-D'));
                $('#{{ $column['field'] }}_max').val(end.format('YYYY-M-D'));
                $().html(start.format('YYYY-M-D') + ' - ' + end.format('YYYY-M-D'))
            }
        )
    </script>
@endpush