@if (isset($dataTable))
    <link rel="stylesheet" href="{{ url('css/jquery.datatables.min.css') }}">
    {!! $dataTable->table() !!}
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/jquery.datatables.min.js') }}"></script>
    @if (isset($buttons) && $buttons)
        <link rel="stylesheet" href="{{ url('css/buttons.css') }}">
        <script src="{{ url('js/buttons.server-side.js') }}"></script>
    @endif
    {!! $dataTable->scripts() !!}
@endif