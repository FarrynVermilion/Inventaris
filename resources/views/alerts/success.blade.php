@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"style="color: black">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
