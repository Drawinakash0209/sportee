@if (session() -> has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"  class="z-1000000 fixed top-20 left-1/2 transform -translate-x-1/2 bg-sky-950 text-white px-48 py-4">

    <p> {{session('message')}} </p>

</div>
@endif