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