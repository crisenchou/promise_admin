@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            {{$title or ''}}
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <a href="{{route($route.'.create')}}">新建</a>
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
                            @if(!$list->count())
                                暂无数据
                            @endif
                            @foreach($list as $cate)
                                <li class="dd-item" data-id="{{$cate->id}}">
                                    <div class="dd-handle">
                                        {{$cate->name}}
                                        <div class="pull-right action-buttons">
                                            <a class="blue" href="{{route($route.'.edit',['id'=>$cate->id])}}">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                            <a class="red" href="#"
                                               data-action="{{route($route.'.destroy',['id'=>$cate->id])}}"
                                               data-toggle="modal"
                                               data-target="#deleteModal">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @if(count($cate->subCategory))
                                        <ol class="dd-list">
                                            @foreach($cate->subCategory as $subCate)
                                                <li class="dd-item" data-id="{{$subCate->id}}">
                                                    <div class="dd-handle">
                                                        {{$subCate->name}}
                                                        <div class="pull-right action-buttons">
                                                            <a class="blue"
                                                               href="{{route($route.'.edit',['id'=>$subCate->id])}}">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red" href="#"
                                                               data-action="{{route($route.'.destroy',['id'=>$subCate->id])}}"
                                                               data-toggle="modal"
                                                               data-target="#deleteModal">
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
    @include('admin.components.widget.delete-modal')
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