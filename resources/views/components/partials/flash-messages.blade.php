@if ($message = Session::get('success'))
    <div class="fixed top-0 right-0 inset-x-0 mb-6 mx-6 px-6 py-5 max-w-sm rounded-lg pointer-events-auto bg-green-500 text-white">
    {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
    <div class="fixed top-0 right-0 inset-x-0 mb-6 mx-6 px-6 py-5 max-w-sm rounded-lg pointer-events-auto bg-orange-500 text-white">
    {{ $message }}
</div>
@endif

@if ($message = Session::get('danger'))
    <div class="fixed top-0 right-0 inset-x-0 mb-6 mx-6 px-6 py-5 max-w-sm rounded-lg pointer-events-auto bg-red-500 text-white">
    {{ $message }}
</div>
@endif