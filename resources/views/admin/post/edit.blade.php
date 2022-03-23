@extends('layouts.app')

@section('title', "Yangilik qo'shish")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Tahrirlash</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Yangiliklar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.errors')
                        <form action="{{ route('post.update', ['post' => $post]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="title">Sarlavha</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="short_desc">Qisqacha matn</label>
                                    <textarea name="short_desc" id="short_desc" cols="30" rows="5" class="form-control">{{ $post->short_desc }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="desc">To'liq matn</label>
                                    <textarea name="desc" id="desc" cols="30" rows="10">{{ $post->desc }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="status">Holati</label> <br>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">---</option>
                                        <option value="2" @if($post->status == 2) selected @endif>Aktiv</option>
                                        <option value="1" @if($post->status == 1 and $post->status != null) selected @endif>Aktiv emas</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="p_order">Tartibi</label> <br>
                                    <input type="number" name="p_order" class="form-control" id="p_order" value="{{ $post->p_order }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="publish_date">Sanasi</label> <br>
                                    <input type="text" name="publish_date" class="form-control datepicker" placeholder="kun-oy-yil" id="publish_date" value="{{ $post->publish_date }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="image">Rasm</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @if($post->image)
                                        <div id="img_box">
                                            <img src="/storage/uploads/post/medium/{{ $post->image }}" width="100" alt="{{ $post->title }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i> Saqlash</button>
                                        <a href="{{ route('post.index') }}" class="btn btn-secondary btn-sm"><i class="lni lni-arrow-left"></i> Orqaga qaytish</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">

        CKEDITOR.replace('desc', {
            filebrowserUploadUrl: "{{ route('ckeditor_image_upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form',
            allowedContent: true,
            toolbar: [
                {name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', '-']},
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo'],
                    items: ['Cut', 'Copy', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    groups: ['find', 'selection', 'spellchecker', 'editing'],
                    items: ['-', '-', 'Scayt']
                },
                {name: 'forms', groups: ['forms'], items: ['']},
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Language']
                },
                {name: 'links', groups: ['links'], items: ['Link', 'Unlink', 'Anchor']},
                {name: 'insert', groups: ['insert'], items: ['Image', 'Table', 'SpecialChar']},
                {name: 'styles', groups: ['styles'], items: ['Styles', 'Format', 'Font', 'FontSize']},
                {name: 'colors', groups: ['colors'], items: ['TextColor', 'BGColor']},
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup'],
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-']
                },
                {name: 'tools', groups: ['tools'], items: ['Maximize']},
                {name: 'others', groups: ['others'], items: ['-']},
                {name: 'about', groups: ['about'], items: ['About']}
            ],
            toolbarGroups: [
                {name: 'document', groups: ['mode', 'document', 'doctools']},
                {name: 'clipboard', groups: ['clipboard', 'undo']},
                {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
                {name: 'forms', groups: ['forms']},
                {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
                {name: 'links', groups: ['links']},
                {name: 'insert', groups: ['insert']},
                {name: 'styles', groups: ['styles']},
                {name: 'colors', groups: ['colors']},
                {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                {name: 'tools', groups: ['tools']},
                {name: 'others', groups: ['others']},
                {name: 'about', groups: ['about']}
            ]
        });

        $('#title').on('blur', function () {
            $.ajax({
                type: 'GET',
                url: '/dashboard/generate_slug',
                data: {title_ru: $(this).val(), id: null, type: 'post'},
                success: function (data) {
                    $('#slug').val(data.slug);
                }
            });
        });
    </script>
@endsection

