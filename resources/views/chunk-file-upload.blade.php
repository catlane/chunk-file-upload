<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}" >

    <label for="{{$id}}" class="col-sm-2 control-label" >{{$label}}</label>
    <div class="col-sm-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
	    <span style="color: red;">
            @include('admin::form.error')
        </span>

        <div id="wrapper">
            <div id="container">
                <!--头部，相册选择和格式选择-->

                <div id="uploader">
                    <div class="queueList">
                        <div id="dndArea" class="placeholder">
                            <div id="filePicker"></div>
                            <p>或将文件拖到这里，单次只可选一张哦</p>
                        </div>
                    </div>
                    <div class="statusBar" style="display:none;">
                        <div class="progress">
                            <span class="text">0%</span>
                            <span class="percentage"></span>
                        </div><div class="info"></div>
                        <div class="btns">
                            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="{{$name}}" id="{{$name}}-savedpath" value="{{ old($column, $value) }}">
	    @include('admin::form.help-block')
    </div>
</div>






