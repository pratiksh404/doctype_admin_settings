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
                        <div class="col-lg-2">
                            <select name="setting_type" id="setting_type" class="form-control">
                                <option value="1">Text</option>
                                <option value="2">Rich Text Box</option>
                                <option value="3">Image</option>
                                <option value="4">Select Dropdown</option>

                            </select>
                        </div>
                        <div class="col-lg-6">
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
                                <div class="card-body" style="min-height:10vh;height:auto">
                                    <input type="hidden" name="setting_custom" id="setting_custom">
                                    <div id="editor"></div>
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

                <form action="{{url(config('setting.prefix','admin').'/'.'setting').'/'.$setting->id}}" method="post"
                    enctype="multipart/form-data">
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

                            {{-----------------Image Input -----------------}}
                            @include('setting::setting.layouts.form_component.image')
                            {{-- ---------------------------------------------- --}}

                            {{-----------------Select Input -----------------}}
                            @include('setting::setting.layouts.form_component.select')
                            {{-- ---------------------------------------------- --}}

                        </div>
                        <div class="col-lg-2 d-flex justify-content-around">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>
                    <br>
                </form>
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                    data-target="#setting-{{$setting->id}}">
                    <i class="fas fa-trash"></i>
                </button>
                <hr>
                {{-- Delete Model --}}
                @include('setting::setting.layouts.confirm_delete')
                <!-- /.modal -->
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
<style>
    #editor {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
<link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.11/ace.js"></script>
<script>
    $(function () {
/* Ace Editor JSON mode */
      var editor = ace.edit("editor");
                editor.getSession().setMode("ace/mode/html");
                editor.setTheme("ace/theme/chrome");
                editor.getSession().setTabSize(2);
                editor.getSession().setUseWrapMode(true);


     var input = $('input[name="setting_custom"]');
        editor.getSession().on("change", function () {
        input.val(editor.getSession().getValue());
        });

// Select2
$('.select2').select2()

    // Summernote
    $('.textarea').summernote();

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