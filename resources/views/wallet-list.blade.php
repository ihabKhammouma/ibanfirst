@extends('layout')
@section('title')
@parent - wallets list
@endsection

@section('content')
<div class="container">
    <h1>List Wallet</h1>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>tag</th>
                <th>currency</th>
                <th>booking Amount value</th>
                <th>booking Amount currency</th>
                <th>value Amount value</th>
                <th>value Amount currency</th>
                <th>date Last Financial Movement</th>
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
                    "url": "{{ url('api/allwallets') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}
                },
            "columns": [
                { "data": "id" },
                { "data": "tag","orderable": false },
                { "data": "currency","orderable": false },
                { "data": "bookingAmount.value","orderable": false },
                { "data": "bookingAmount.currency","orderable": false },
                { "data": "valueAmount.value","orderable": false },
                { "data": "valueAmount.currency","orderable": false },
                { "data": "dateLastFinancialMovement","orderable": false }
            ],
            "columnDefs": [ 
                {
                    "targets": 0,
                    "data": "download_link",
                    "render": function ( data, type, row, meta ) {
                    return '<a href="/wallets/'+data+'">'+data+'</a>';
                    }
                }
            ]	 

        });
        } );

        
    </script>   
@endsection