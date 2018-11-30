@extends('adminlte::layouts.app')

@section('htmlheader_title')
    @yield('contentheader_title')
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">@yield('contentheader_form')</h3>--}}

                        {{--<div class="box-tools pull-right">--}}
                            {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                                {{--<i class="fa fa-minus"></i></button>--}}
                            {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                            {{--<i class="fa fa-times"></i></button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="box-body">
                        @yield('content')
                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
    </div>
@endsection
