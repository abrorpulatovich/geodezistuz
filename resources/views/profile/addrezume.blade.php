@extends('layouts.app_template')

@section('title', "Rezume qo'shish")

@section('content')

    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-xs-12">
                    @include('includes.user_profile_leftside')
                </div>
                <div class="col-lg-7 col-md-12 col-xs-12" style="border: 1px solid #eee; padding: 20px;">
                    <form method="post" action="{{ route('user_post_rezume') }}">
                        @csrf
                        <h6>Shaxsiy ma‘lumotlaringiz</h6>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="passport"
                                       class="col-form-label text-md-end">{{ __('Passport') }}</label>
                                <input id="passport" type="text" class="form-control" name="passport"
                                       value="{{ $citizen->passport }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="full_name" class="col-form-label text-md-end">{{ __('F.I.O') }}</label>
                                <input id="full_name" type="text" class="form-control" name="full_name"
                                       value="{{ $citizen->full_name }}" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="phone_number"
                                       class="col-form-label text-md-end">{{ __('Telefon raqam') }}</label>
                                <input id="phone_number" type="text" class="form-control" name="phone_number"
                                       value="{{ $citizen->phone_number }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="region_id" class="col-form-label text-md-end">{{ __('Hudud') }}</label>
                                <input id="region_id" type="text" class="form-control" name="region_id"
                                       value="{{ $rezume::regionName($citizen->region_id)->name_uz }}" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="birth_date"
                                       class="col-form-label text-md-end">{{ __('Tug‘ilgan sana') }}</label>
                                <input id="birth_date" type="text" class="form-control" name="birth_date"
                                       value="{{ $citizen->birth_date }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <hr style="height: 5%;">
                            </div>
                        </div>
                        <h6>Mehnat faoliyatingiz</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_history" name="is_history" value="0"
                                           class="history_hide"><span> {{ __('Mehnat staji mavjud emas') }}</span>
                                </label>
                            </div>
                        </div>
                        <div id="hide_history">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{ __('Korxona nomi') }}</th>
                                            <th>{{ __('Lavozim') }}</th>
                                            <th>{{ __('Ishni boshlagan sana') }}</th>
                                            <th>{{ __('Ishdan bo‘shagan sana') }}</th>
                                            <th>
                                                <button type="button" class="btn btn-primary" id="plus_btn"><i
                                                        class="lni lni-plus"></i>
                                                </button>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input id="old_company_name" type="text"
                                                       class="old_company_name form-control"
                                                       name="workplaces[0][old_company_name]"
                                                       value="{{ old('old_company_name') ?? $workbook->old_company_name }}"
                                                       required="required">
                                            </td>
                                            <td>
                                                <input id="position_name" type="text"
                                                       class="position_name form-control"
                                                       name="workplaces[0][position_name]"
                                                       value="{{ old('position_name') ?? $workbook->position_name }}"
                                                       required="required">
                                            </td>
                                            <td>
                                                <input id="from_date" type="text"
                                                       class="birth_date from_date form-control"
                                                       name="workplaces[0][from_date]"
                                                       value="{{ old('from_date') ?? $workbook->from_date }}"
                                                       required="required">
                                            </td>
                                            <td>
                                                <input id="to_date" type="text"
                                                       class="birth_date to_date form-control"
                                                       name="workplaces[0][to_date]"
                                                       value="{{ old('to_date') ?? $workbook->to_date }}"
                                                       required="required">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <hr style="height: 5%;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="specialist_id"
                                       class="col-form-label text-md-end">{{ __('Mutaxassislikni tanlang') }}</label>
                                <select name="specialist_id" required id="specialist_id" class="form-control">
                                    <option value="">Mutaxassislikni tanlang...</option>
                                    @foreach($specialists as $specialist)
                                        <option value="{{ $specialist->id }}"
                                                data-id="{{ $specialist->id }}">{{ $specialist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="skill"
                                       class="col-form-label text-md-end">{{ __('Mehnat staji') }}</label>
                                <select name="skill" required id="skill" class="form-control">
                                    <option value="">Mehnat stajini tanlang...</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}"
                                                data-id="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6" id="salary_hidden">
                                <label for="salary"
                                       class="col-form-label text-md">{{ __('Siz kutayotgan maosh miqdori? (so‘m)') }}</label>
                                <input id="salary" type="text" class="salary form-control" name="salary"
                                       value="{{ old('salary') ?? $rezume->salary }}" required="required">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_salary" name="is_salary" value="0"
                                           class="hide_salary"><span> {{ __('Maosh kelishilgan holda') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="about_me" class="col-form-label text-md">{{ __('Siz kutayotgan maosh miqdori? (so‘m)') }}</label>
                                <textarea name="about_me" id="about_me" cols="30" rows="5"></textarea>
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

        CKEDITOR.replace('about_me', {
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
