@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            设置
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal">
                <div class="tabbable">
                    <div class="tab-content profile-edit-tab-content">
                        <div id="edit-settings" class="tab-pane active">
                            <div class="space-10"></div>
                            <div>
                                <label class="inline">允许注册
                                    <input name="canRegister" class="ace ace-switch ace-switch-4"
                                           type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </div>

                            <div class="space-8"></div>

                            <div>
                                <label class="col-lg-1" for="inline">皮肤</label>
                                <div class="dropdown dropdown-colorpicker dropup">
                                    <a data-toggle="dropdown" class="dropdown-toggle"
                                       data-position="auto"
                                       aria-expanded="false">
                                        <span class="btn-colorpicker" style="background-color:#438EB9;"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-caret" style="">
                                        <li><a class="colorpick-btn" style="background-color:#438EB9;"
                                               data-color="#438EB9"></a></li>
                                        <li><a class="colorpick-btn" style="background-color:#222A2D;"
                                               data-color="#222A2D"></a></li>
                                        <li><a class="colorpick-btn" style="background-color:#C6487E;"
                                               data-color="#C6487E"></a></li>
                                        <li><a class="colorpick-btn" style="background-color:#D0D0D0;"
                                               data-color="#D0D0D0"></a></li>
                                    </ul>
                                </div>
                                <select name="skin" class="hide">
                                    <option value="no-skin" selected>#438EB9</option>
                                    <option value="skin-1">#222A2D</option>
                                    <option value="skin-2">#C6487E</option>
                                    <option value="skin-3">#D0D0D0</option>
                                </select>
                            </div>

                            <div class="space-8"></div>

                            <div>
                                <label>
                                    <input name="form-field-checkbox" class="ace" type="checkbox">
                                    <span class="lbl">启用设置</span>
                                </label>
                                <label>
                                    <span class="space-2 block"></span>
                                    for
                                    <input class="input-mini" maxlength="3" type="text">
                                    days
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Save
                        </button>

                        &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection