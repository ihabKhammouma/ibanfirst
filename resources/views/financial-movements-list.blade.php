@extends('layout')
@section('title')
@parent - wallets list
@endsection

@section('content')
<div class="container">
    <h1>List Financial Movements</h1>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>booking Date</th>
                <th>value Date</th>
                <th>wallet Id</th>
                <th>Amount Value</th>
                <th>currency</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax":{
                 "url": "{{ url('api/allfinancial-movements') }}",
                 "dataType": "json",
                 "type": "POST",
                 "data":{ _token: "{{csrf_token()}}"}
               },
        "columns": [
            { "data": "id" },
            { "data": "bookingDate","orderable": false },
            { "data": "valueDate","orderable": false },
            { "data": "walletId","orderable": false },
            { "data": "amount.value","orderable": false },
            { "data": "amount.currency","orderable": false }
        ],
        "columnDefs": [ 
            {
                "targets": 0,
                "data": "download_link",
                "render": function ( data, type, row, meta ) {
                return '<a href="/financial-movements/'+data+'">'+data+'</a>';
                }
            },
            {
                "targets": 3,
                "data": "download_link",
                "render": function ( data, type, row, meta ) {
                return '<a href="wallets/'+data+'">'+data+'</a>';
                }
            } 
        ]	 

    });
    } );

    
</script>   
@endsection