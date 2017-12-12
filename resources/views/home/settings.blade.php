@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            设置
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="{{route('settings.save')}}" method="post">

                {{csrf_field()}}
                <div class="tabbable">
                    <div class="tab-content profile-edit-tab-content">
                        <div id="edit-settings" class="tab-pane active">
                            <div class="space-10"></div>
                            <div>
                                <label class="inline">允许注册
                                    <input name="register" class="ace ace-switch ace-switch-4"
                                           type="checkbox" @if($openRegister) checked @endif>
                                    <span class="lbl"></span>
                                </label>
                            </div>

                            <div class="space-8"></div>
                            <div>
                                <label class="inline">皮肤
                                    <select name="skin">
                                        <option value="no-skin" @if($skin=='no-skin') selected @endif>蓝色</option>
                                        <option value="skin-1" @if($skin=='skin-1') selected @endif>黑色</option>
                                        <option value="skin-2" @if($skin=='skin-2') selected @endif>红色</option>
                                        <option value="skin-3" @if($skin=='skin-3') selected @endif>灰色</option>
                                    </select>
                                    <span class="lbl"></span>
                                </label>
                            </div>

                            <div class="space-8"></div>
                            <!--<div>
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
                            </div>-->
                        </div>

                    </div>
                </div>
                {{Form::bsButton()}}
            </form>
        </div>
    </div>
@endsection