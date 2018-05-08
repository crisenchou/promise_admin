@if(session('message'))
    @if(session('message_type') == 'success')
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <p>
                <strong>
                    <i class="ace-icon fa fa-check"></i>
                    {{ session('message') }}
                </strong>
            </p>
        </div>
    @else
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <p>
                <strong>
                    <i class="ace-icon fa fa-bolt"></i>
                    {{ session('message') }}
                </strong>
            </p>
        </div>
    @endif
    @push('scripts')
        <script>
            setTimeout(function () {
                $('.alert').fadeOut();
            }, 3000);
        </script>
    @endpush
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <div class="alert ui-pnotify-container alert-success ui-pnotify-shadow" role="alert" style="min-height: 16px;">
        <div class="ui-pnotify-closer" aria-role="button" tabindex="0" title="Close"
             style="cursor: pointer; visibility: hidden;"><span class="glyphicon glyphicon-remove"></span></div>
        <div class="ui-pnotify-sticker" aria-role="button" aria-pressed="false" tabindex="0" title="Unstick"
             style="cursor: pointer; visibility: hidden;"><span class="glyphicon glyphicon-play"
                                                                aria-pressed="true"></span></div>
        <div class="ui-pnotify-icon"><span class="glyphicon glyphicon-ok-sign"></span></div>
        <h4 class="ui-pnotify-title">Regular Success</h4>
        <div class="ui-pnotify-text" aria-role="alert">That thing that you were trying to do worked!</div>
    </div>
@endif
