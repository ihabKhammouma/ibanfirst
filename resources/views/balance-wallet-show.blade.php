@extends('layout')
@section('title')
@parent - wallets list
@endsection
@section('content')
<div class="container">
    <h1>Details Wallet balance for a given date/h1>

    <h4>check wallet balance</h4>
    <form action="{{ url('wallet-balance/'.$id) }}" method="GET"> 
        {{ csrf_field() }}
        
        <label>Start date:</label>
        <input type="date" id="start" name="date">
        <button type="submit">search</button>
    </form>

    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">wallet id:</strong>
                    <span class="list-group-right">{{ $id }}</span>
                </div>
            </li>
            @if(isset($balance))
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">balance:</strong>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">closing Date:</strong>
                    <span class="list-group-right">{{ $balance->balance->closingDate }}</span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="list-group-item-fixed">
                            <strong class="list-group-left">booking Amount:</strong>
                        </div>
                        <div class="list-group-item-fixed">
                            <strong class="list-group-left">value:</strong>
                            <span class="list-group-right">{{ $balance->balance->bookingAmount->value }}</span>
                        </div>
                        <div class="list-group-item-fixed">
                            <strong class="list-group-left">currency:</strong>
                            <span class="list-group-right">{{ $balance->balance->bookingAmount->currency }}</span>
                        </div>
                    </li>
                </ul>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="list-group-item-fixed">
                            <strong class="list-group-left">value Amount:</strong>
                        </div>
                        <div class="list-group-item-fixed">
                            <strong class="list-group-left">value:</strong>
                            <span class="list-group-right">{{ $balance->balance->valueAmount->value }}</span>
                        </div>
                        <div class="list-group-item-fixed">
                            <strong class="list-group-left">currency:</strong>
                            <span class="list-group-right">{{ $balance->balance->valueAmount->currency }}</span>
                        </div>
                    </li>
                </ul>
            </li>
            @endif
           
        </ul>
    </div>
</div>
 
  @endsection