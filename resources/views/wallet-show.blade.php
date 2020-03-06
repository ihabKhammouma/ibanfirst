@extends('layout')
@section('title')
@parent - wallets list
@endsection
@section('content')
<div class="container">
    <h1>Wallet Details</h1>

    <h4>wallet balance</h4>
    <form action="{{ url('wallet-balance/'.$wallet->id) }}" method="GET"> 
        {{ csrf_field() }}
        
        <label>Start date:</label>
        <input type="date" id="start" name="date" value="2019-04-05">
        <button type="submit">search</button>
    </form>

    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">id:</strong>
                    <span class="list-group-right">{{ $wallet->id }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">currency:</strong>
                    <span class="list-group-right">{{ $wallet->currency }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">tag:</strong>
                    <span class="list-group-right">{{ $wallet->tag }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">status:</strong>
                    <span class="list-group-right">{{ $wallet->status }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">account Number:</strong>
                    <span class="list-group-right">{{ $wallet->accountNumber }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">correspondent Bank:</strong>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">bic:</strong>
                    <span class="list-group-right">{{ $wallet->correspondentBank->bic }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">name:</strong>
                    <span class="list-group-right">{{ $wallet->correspondentBank->name }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">address:</strong>
                    <span class="list-group-right">{{ $wallet->correspondentBank->address->country }}
                    {{$wallet->correspondentBank->address->city}} ,
                    {{$wallet->correspondentBank->address->postCode}}, 
                    {{$wallet->correspondentBank->address->street}}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">holder Bank:</strong>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">bic:</strong>
                    <span class="list-group-right">{{ $wallet->holderBank->bic }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">clearingCode:</strong>
                    <span class="list-group-right">{{ $wallet->holderBank->clearingCode }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">name:</strong>
                    <span class="list-group-right">{{ $wallet->holderBank->name }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">address":</strong>
                    <span class="list-group-right">
                        {{ $wallet->correspondentBank->address->country }}
                        {{$wallet->correspondentBank->address->city}} ,
                        {{$wallet->correspondentBank->address->postCode}}, 
                        {{$wallet->correspondentBank->address->street}}
                    </span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">holder:</strong>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">name:</strong>
                    <span class="list-group-right">{{ $wallet->holder->name }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">type:</strong>
                    <span class="list-group-right">{{ $wallet->holder->type }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">address:</strong>
                    <span class="list-group-right">
                        {{ $wallet->correspondentBank->address->country }}
                        {{$wallet->correspondentBank->address->city}} ,
                        {{$wallet->correspondentBank->address->postCode}}, 
                        {{$wallet->correspondentBank->address->street}}    
                    </span>
                </div>
            </li>
        </ul>
    </div>
</div>
 
  @endsection