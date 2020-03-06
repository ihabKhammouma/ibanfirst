@extends('layout')
@section('title')
@parent - wallets list
@endsection
@section('content')
<div class="container">
    <h1>Financial Movements Details</h1>
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">id:</strong>
                    <span class="list-group-right">{{ $financialMovement->id }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">wallet Id:</strong>
                    <span class="list-group-right">{{ $financialMovement->walletId }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">booking Date:</strong>
                    <span class="list-group-right">{{ $financialMovement->bookingDate }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">value Date:</strong>
                    <span class="list-group-right">{{ $financialMovement->valueDate }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">ordering Account Number:</strong>
                    <span class="list-group-right">{{ $financialMovement->orderingAccountNumber }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">beneficiary Account Number:</strong>
                    <span class="list-group-right">{{ $financialMovement->beneficiaryAccountNumber }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">ordering Customer:</strong>
                    <span class="list-group-right">{{ $financialMovement->orderingCustomer }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">ordering Institution:</strong>
                    <span class="list-group-right">{{ $financialMovement->orderingInstitution }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">beneficiary Customer:</strong>
                    <span class="list-group-right">{{ $financialMovement->beneficiaryCustomer }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">beneficiary Institution:</strong>
                    <span class="list-group-right">{{ $financialMovement->beneficiaryInstitution }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">ordering Amount:</strong>
                    <span class="list-group-right">{{ $financialMovement->orderingAmount->value }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">currency:</strong>
                    <span class="list-group-right">{{ $financialMovement->orderingAmount->currency }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">beneficiary Amount:</strong>
                    <span class="list-group-right">{{ $financialMovement->beneficiaryAmount->value }}</span>
                </div>
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">currency:</strong>
                    <span class="list-group-right">{{ $financialMovement->beneficiaryAmount->currency }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">remittance Information:</strong>
                    <span class="list-group-right">{{ $financialMovement->remittanceInformation }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">charges Details:</strong>
                    <span class="list-group-right">{{ $financialMovement->chargesDetails }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">exchange Rate:</strong>
                    <span class="list-group-right">{{ $financialMovement->exchangeRate }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">type Label:</strong>
                    <span class="list-group-right">{{ $financialMovement->typeLabel }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">internal Reference:</strong>
                    <span class="list-group-right">{{ $financialMovement->internalReference }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="list-group-item-fixed">
                    <strong class="list-group-left">description:</strong>
                    <span class="list-group-right">{{ $financialMovement->description }}</span>
                </div>
            </li>
        </ul>
    </div>
</div>
 
  @endsection