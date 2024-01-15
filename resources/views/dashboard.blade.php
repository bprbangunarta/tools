@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" style="min-height: 1136.28px;">
        <section class="content">
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $transaksi }}</h3>
                            <p>Total Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <a href="{{ route('dashboard') }}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $deposito }}</h3>
                            <p>Update QQ Deposito</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <a href="{{ route('deposito.index') }}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $tabungan }}</h3>
                            <p>Update QQ Tabungan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <a href="{{ route('tabungan.index') }}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ $nasabah }}</h3>
                            <p>Update Nomor HP</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <a href="{{ route('nasabah.index') }}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
