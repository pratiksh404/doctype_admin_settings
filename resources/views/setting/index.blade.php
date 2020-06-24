@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{url(config('setting.prefix','admin').'/'.'dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@stop


@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Make Setting</h3>
            </div>
            <div class="card-body">
                <form action="{{url(config('setting.prefix','admin').'/'.'setting')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4">
                            <input type="text" name="setting_name" id="setting_name" class="form-control"
                                placeholder="Setting's Name">
                        </div>
                        <div class="col-lg-4">
                            <select name="setting_type" id="setting_type" class="form-control">
                                <option value="1">Text</option>
                                <option value="2">Rich Text Box</option>
                                <option value="3">Image/File</option>
                                <option value="4">Checkbox</option>
                                <option value="5">Select Dropdown</option>
                                <option value="6">Radio</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Custom</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea name="setting_custom" id="setting_custom" cols="30" rows="10"></textarea>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block">Create Setting</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> Settings</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (count($settings) > 0)
                @foreach ($settings as $setting)

                <form action="{{url(config('setting.prefix','admin').'/'.'setting').'/'.$setting->id}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-10">
                            {{----------------- Text Field Input -----------------}}
                            @include('setting::setting.layouts.form_component.text')
                            {{-- ---------------------------------------------- --}}

                            {{-----------------Rich Text Box Input -----------------}}
                            @include('setting::setting.layouts.form_component.richtext')
                            {{-- ---------------------------------------------- --}}

                        </div>
                        <div class="col-lg-2 d-flex justify-content-around">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#setting-{{$setting->id}}">
                                <i class="fas fa-trash"></i>
                            </button>
                            {{-- Delete Model --}}
                            @include('setting::setting.layouts.confirm_delete')
                            <!-- /.modal -->
                        </div>
                    </div>
                    <br>
                </form>

                @endforeach
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script>
    $(function () {

    // Summernote
    $('.textarea').summernote()
    // Datatable
    $("#datatable").DataTable({
      "responsive": true,
      "autoWidth": true,
      "ordering": true,
      "info": true,
    });
  });
</script>
@stop