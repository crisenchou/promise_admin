@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            菜单管理
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <a href="{{route('menu.create')}}">新建</a>
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
                                    @if(count($menu->submenu))
                                        <ol class="dd-list">
                                            @foreach($menu->submenu as $submenu)
                                                <li class="dd-item" data-id="{{$submenu->id}}">
                                                    <div class="dd-handle">
                                                        {{$submenu->name}}
                                                        <div class="pull-right action-buttons">
                                                            <a class="blue"
                                                               href="{{route('menu.edit',['id'=>$submenu->id])}}">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            <a class="red" href="#">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
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