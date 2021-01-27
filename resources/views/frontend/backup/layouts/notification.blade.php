@if(session('success'))
    <div class="toastdis alert fade show shadow text-center" style="position: fixed; bottom: 20px; left: 50%; transform: translate(-50%); background-color: #2ec1abe0; width: 80%; color: #fff; z-index: 2147483640; border-radius: 0px; padding-top: 10px; padding-bottom: 6px;">
        <button class="float-left close" data-dismiss="alert" aria-label="Close" style="padding-bottom: 6px;">
            <i class="ion-android-close text-white" style="font-size: 15px;"></i>
        </button>
        {{session('success')}}
    </div>
@endif


@if(session('error'))
    <div class="toastdis alert fade show shadow text-center" style="position: fixed; bottom: 20px; left: 50%; transform: translate(-50%); background-color: #ea2c62e0; width: 80%; color: #fff; z-index: 2147483640; border-radius: 0px; padding-top: 10px; padding-bottom: 6px;">
        <button class="float-left close" data-dismiss="alert" aria-label="Close" style="padding-bottom: 6px;">
            <i class="ion-android-close text-white" style="font-size: 15px;"></i>
        </button>
        {{session('error')}}
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(".toastdis").delay(4000).slideUp(1000, function() {
        $(this).alert('close');
    });
</script>