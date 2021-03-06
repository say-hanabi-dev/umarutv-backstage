@extends('layouts.app')
@section('title','Backstage Config')
@section('content')
    <div class="col-md-10">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Backstage Setting</h3>
                <a class="btn btn-primary pull-right" href="{{ route('admin.setting.create') }}">Add Settings</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    @foreach($setting as $set)
                        <div class="form-group">
                            <label for="Input{{ $set->key }}">{{ ucfirst($set->key) }}</label>
                            <input type="text" class="form-control on-click-push" data-name="{{ $set->id }}" id="Input{{ $set->key }}" placeholder="{{ $set->comment }}" value="{{ $set->value }}">
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2">
        @component('layouts.components.annex')  @endcomponent
    </div>
@endsection