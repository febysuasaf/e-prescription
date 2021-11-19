@if (Session::has('success'))
<input type="hidden" class="swalDefaultSuccess" id="swalDefaultSuccess" value="{{ Session::get('success') }}" />
@endif
@if (Session::has('error'))
<input type="hidden" class="swalDefaultError" id="swalDefaultError" value="{{ Session::get('error') }}" />
@endif
@if (Session::has('info'))
<input type="hidden" class="swalDefaultInfo" id="swalDefaultInfo" value="{{ Session::get('info') }}" />
@endif
