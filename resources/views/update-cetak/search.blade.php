@extends('layouts.app')
@section('title', 'Fix Cetak Tabungan')

@section('content')
<div class="content-wrapper" style="min-height: 912px;">
    <section class="content">
        <div class="row">

            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-filter"></i>
                        <h3 class="box-title">NASABAH TABUNGAN</h3>
                    </div>

                    <form role="form" action="{{ route('tabungan.cetak.update') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>No. Tabungan</label>
                                <input type="number" class="form-control" name="noacc" minlength="16" value="{{ $tabungan->noacc }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nomor CIF</label>
                                <input type="text" class="form-control" name="nocif" value="{{ $tabungan->nocif }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Debitur</label>
                                <input type="text" class="form-control" name="nama" value="{{ $tabungan->fnama }}">
                            </div>

                            <div class="form-group">
                                <label>Cetak Tabungan</label>
                                <select class="form-control" name="kodebuku" required>
                                    <option value="{{ $tabungan->kodebuku == '00' ? '01' : '01' }}">{{ $tabungan->kodebuku == '00' ? 'FIX CETAK TABUNGAN' : 'TABUNGAN SUDAH BENAR' }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <a href="{{ route('tabungan.cetak.index') }}" class="btn btn-danger">RESET</a>
                            <button type="submit" class="btn btn-success pull-right">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border" style="border-bottom: 1px solid #00A65A;">
                        <i class="fa fa-file-text-o"></i>
                        <h3 class="box-title">HISTORY UPDATE</h3>

                        <div class="box-tools">
                            <form action="{{ route('tabungan.index') }}" method="GET">
                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                    <input type="text" class="form-control text-uppercase pull-right" style="width: 150px;" name="keyword" id="keyword" value="{{ request('keyword') }}" placeholder="Search">

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
                        <table class="table table-bordered text-uppercase" style="font-size: 12px;">
                            <thead>
                                <tr class="bg-green">
                                    <th class="text-center" width="3%">#</th>
                                    <th class="text-center">NOCIF</th>
                                    <th class="text-center">NOACC</th>
                                    <th class="text-center">NAMA NASABAH</th>
                                    <th class="text-center">DATE TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->nocif }}</td>
                                    <td>{{ $item->noacc }}</td>
                                    <td>{{ $item->nama_nasabah }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer clearfix">
                        <div class="pull-left hidden-xs">
                            <button class="btn btn-default btn-sm">
                                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of
                                {{ $data->total() }}
                                entries
                            </button>
                        </div>

                        {{ $data->withQueryString()->onEachSide(0)->links('vendor.pagination.adminlte') }}
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection