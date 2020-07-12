@section('header')
    <header class="header">
        <div class="titleArea">
                <h1 class="header_title"><a href="{{ route('index') }}">Locattey</a></h1>
            <h2 class="header_subtitle">物々交換サイト</h2>
        </div>
    </header>
@endsection

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif
