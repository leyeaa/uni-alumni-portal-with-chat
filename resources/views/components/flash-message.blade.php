@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 6000)" x-show="show" class="col-lg-4 main-btn px-48 py-1 offset-lg-4 text-center" style="position: fixed; top: 0px; left:0px;">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif