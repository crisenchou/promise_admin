@if(session('message'))
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
@endif