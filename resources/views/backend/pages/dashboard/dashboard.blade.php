@extends('backend.master')
@section('content')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated
                                    Report</span> <button class="btn btn-icons border-0 p-2"><i
                                        class="icon-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                        <div class=" col-md -6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">EXPENSE</span>
                                <h4>$32123</h4>
                                <span class="report-count"> 2 Reports</span>
                            </div>
                            <div class="inner-card-icon bg-success">
                                <i class="icon-rocket"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">PURCHASE</span>
                                <h4>95,458</h4>
                                <span class="report-count"> 3 Reports</span>
                            </div>
                            <div class="inner-card-icon bg-danger">
                                <i class="icon-briefcase"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">QUANTITY</span>
                                <h4>2650</h4>
                                <span class="report-count"> 5 Reports</span>
                            </div>
                            <div class="inner-card-icon bg-warning">
                                <i class="icon-globe-alt"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">RETURN</span>
                                <h4>25,542</h4>
                                <span class="report-count"> 9 Reports</span>
                            </div>
                            <div class="inner-card-icon bg-primary">
                                <i class="icon-diamond"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
