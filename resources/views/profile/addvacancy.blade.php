@extends('layouts.app_template')

@section('title', "Vakant qo'shish")

@section('content')

    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    @include('includes.company_profile_leftside')
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12" style="border: 1px solid #eeeeee; padding: 20px;">
                    <!-- Start Content -->

                    @include('admin.includes.errors')

                    <form method="post" action="{{ route('vacancy.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label text-md-end">{{ __('Nomlanishi') }}</label>
                                <input id="name" type="text" class="name form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="specialist_id" class="col-form-label text-md-end">{{ __('Mutaxassislik') }}</label>
                                <select name="specialist_id" id="specialist_id" class="form-control">
                                    <option value="">Mutaxassislikni tanlang...</option>
                                    @foreach($specialists as $specialist)
                                        <option value="{{ $specialist->id }}" data-id="{{ $specialist->id }}">{{ $specialist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="skill" class="col-form-label text-md-end">{{ __('Mehnat staji') }}</label>
                                <select name="skill" id="skill" class="form-control">
                                    <option value="">Mehnat stajini tanlang...</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}" data-id="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3" id="salary_hidden">
                                <label for="salary" class="col-form-label text-md-end">{{ __('Oylik maosh (so‘m)') }}</label>
                                <input id="salary" type="text" class="salary form-control" name="salary" value="{{ old('salary') }}">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_salary" name="is_salary" value="0" class="hide_salary"><span> {{ __('Oylik kelishlgan holda') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="desc">Vakant haqida (To'liq matn)</label>
                                <textarea name="desc" id="desc" cols="30" rows="10">{{ old('desc') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Saqlash</button>
                    </form>
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
                {name: 'insert', groups: ['insert'], items: ['Table', 'SpecialChar']},
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
    </script>
@endsection
