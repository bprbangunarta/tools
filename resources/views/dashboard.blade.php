@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" style="min-height: 1136.28px;">
        <section class="content-header">
            <h1>Dashboard </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                <li class="active">Default</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    Start creating your amazing application!
                </div>
                <div class="box-footer">
                    Footer
                </div>
            </div>

        </section>
    </div>
@endsection
