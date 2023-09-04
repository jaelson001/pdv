@php
    $id = auth()->user()->company_id;
    $company = \App\Models\Company::find($id)->first();
@endphp
@section("aside")
<aside class="side_menu">
    <div>
        <a class="menu_item logo" href="{{url('/')}}">
            <img src="{{!empty($company->logo) ? Storage::url($company->logo) : '/logo.ico'}}" style="height:auto;width:50px; border-radius: 15px;">
        </a>
        <a class="menu_item" href="{{url('/')}}"><i class="bi bi-house"></i></a>
        <a class="menu_item" href="{{url('/products')}}"><i class="bi bi-box"></i></a>
        <a class="menu_item" href="{{url('/orders')}}"><i class="bi bi-basket2"></i></a>
        <a class="menu_item" href="#"><i class="bi bi-bar-chart"></i></a>
    </div>
    <div>
        <a class="menu_item" href="{{url('/configs')}}"><i class="bi bi-gear"></i></a>
        @auth
        <a class="menu_item" href="{{ url('/sair') }}" >
            <i class="bi bi-box-arrow-left"></i>
        </a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
            <i class="bi bi-person"></i>
        </a>
        @endauth
    </div>
</aside>
@endsection