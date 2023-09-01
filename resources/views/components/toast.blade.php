

@if(session()->has('message'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="message-toast" class="toast">
        <div class="toast-header">
            <strong class="me-auto">YANA</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            {{session('message')}}
        </div>
    </div>
</div>
@endif

<script>
    $(document).ready(function(){
        let toast = $('#message-toast');
        toast.toast('show');
        toast.toast({delay:5000})
    });
</script>