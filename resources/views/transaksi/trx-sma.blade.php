@extends('layouts.app')
@section('title', 'Transaksi SMA Dana')

@section('content')
    <div class="content-wrapper" style="min-height: 912px;">
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border" style="border-bottom: 1px solid #00A65A;">
                            <i class="fa fa-file-text-o"></i>
                            <h3 class="box-title">HISTORY TRANSAKSI [{{ $trx_sma_total }} DATA]</h3>

                            <div class="box-tools">
                                <form action="#" method="GET">
                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                        <input type="text" class="form-control text-uppercase pull-right"
                                            style="width: 150px;" name="keyword" id="keyword"
                                            value="{{ request('keyword') }}" placeholder="Search">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn bg-green">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box-body" style="overflow: auto;white-space: nowrap;width: 100%;">
                            <table class="table table-bordered table-hover" style="font-size: 12px;">
                                <thead>
                                    <tr class="bg-green">
                                        <th class="text-center" width="3%">#</th>
                                        <th class="text-center">NOACC</th>
                                        <th class="text-center">NAMA NASABAH</th>
                                        <th class="text-center">NOMINAL</th>
                                        <th class="text-center">KOLEKTOR</th>
                                        <th class="text-center">STS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trx_sma as $index => $item)
                                        <tr class="danger">
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $item->noacc }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                                            <td>{{ $item->inpuser }}</td>
                                            <td class="text-center">{{ $item->stsrec }}</td>
                                        </tr>
                                    @empty
                                        <tr class="success">
                                            <td class="text-center text-uppercase" colspan="10">Sumua
                                                Transaksi
                                                Sudah di
                                                Otorisasi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
