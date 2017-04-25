@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            菜单管理
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                菜单列表
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">

                            @foreach($list as $menu)
                                <li class="dd-item" data-id="{{$menu->id}}">
                                    <div class="dd-handle">
                                        {{$menu->name}}
                                        <div class="pull-right action-buttons">
                                            <a class="blue" href="{{route('menu.edit',['id'=>$menu->id])}}">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                            <a class="red" href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @if($menu->submenu)
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="3">
                                                <div class="dd-handle">
                                                    Item 3
                                                    <a data-rel="tooltip" data-placement="left" title="Change Date"
                                                       href="#"
                                                       class="pull-right tooltip-info btn btn-primary btn-mini btn-white btn-bold">
                                                        <i class="bigger-120 ace-icon fa fa-calendar"></i>
                                                    </a>
                                                </div>
                                            </li>

                                            <li class="dd-item" data-id="4">
                                                <div class="dd-handle">
                                                    <span class="orange">Item 4</span>
                                                    <span class="lighter grey">
																	&nbsp; with some description
																</span>
                                                </div>
                                            </li>

                                            <li class="dd-item" data-id="5">
                                                <div class="dd-handle">
                                                    Item 5
                                                    <div class="pull-right action-buttons">
                                                        <a class="blue" href="#">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red" href="#">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <ol class="dd-list">
                                                    <li class="dd-item item-orange" data-id="6">
                                                        <div class="dd-handle"> Item 6</div>
                                                    </li>

                                                    <li class="dd-item item-red" data-id="7">
                                                        <div class="dd-handle">Item 7</div>
                                                    </li>

                                                    <li class="dd-item item-blue2" data-id="8">
                                                        <div class="dd-handle">Item 8</div>
                                                    </li>
                                                </ol>
                                            </li>

                                            <li class="dd-item" data-id="9">
                                                <div class="dd-handle btn-yellow no-hover">Item 9</div>
                                            </li>

                                            <li class="dd-item" data-id="10">
                                                <div class="dd-handle">Item 10</div>
                                            </li>
                                        </ol>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@push('scripts')
<!-- page specific plugin scripts -->
<script src="{{asset('assets/js/jquery.nestable.min.js')}}"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {

        $('.dd').nestable();

        $('.dd-handle a').on('mousedown', function (e) {
            e.stopPropagation();
        });

        $('[data-rel="tooltip"]').tooltip();

    });
</script>
@endpush