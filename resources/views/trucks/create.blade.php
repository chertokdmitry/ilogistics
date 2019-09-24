@extends('admin.layouts.main')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h3 style="margin-top:50px;">
            <span>Добавить автовоз</span>
        </h3>
        <div>
            {{ Form::open(array('url' => '/crm/trucks')) }}
            @include('trucks.blocks.fields')
            {{ Form::close() }}
        </div>
    </main>
@endsection