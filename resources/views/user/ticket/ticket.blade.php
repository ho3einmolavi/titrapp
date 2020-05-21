@extends('front.frontLayout')
@section('title', 'ارسال تیکت جدید')


@section('style')



@endsection

@section('content')
    @include('user.sections.profileHeader')
    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 mt-0">

                            <form action="{{ route('storeTicket') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="col-md-12 mt-1 ">
                                    <fieldset class="form-group">
                                        <label class="my-1 mr-2" for="city">بخش مورد نظر </label>
                                        <select class="custom-select  cityId" id="category_id"
                                                name="category_id">
                                            @foreach(\App\TicketCategory::all() as $ticket_category)
                                                <option value="{{$ticket_category->id}}" {{old('category_id') ==$ticket_category->id ? 'selected' : '' }}>{{$ticket_category->name}}</option>
                                            @endforeach


                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-12 mt-1 ">
                                    <fieldset class="form-group">
                                        <label class="my-1 mr-2" for="city"> اولویت</label>
                                        <select class="custom-select  " id="priority" name="priority">
                                            @for ($i = 0; $i < count(\App\Enums\Priority::getKeys()); $i++)
                                                <option value="{{$i}}">{{\App\Enums\Priority::getPriority($i)}}</option>
                                            @endfor
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-12 mt-1 ">
                                    <div class="form-group label-floating card">
                                        <label class="control-label">عنوان تیکت</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}">

                                    </div>
                                    @error('title')
                                    <div style=" color: red; font-size: 12px;"><span
                                                style="margin-bottom: 10px;" class="fa fa-times"></span> {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-1 ">
                                    <div class="form-group label-floating card">
                                        <label class="control-label">متن تیکت</label>
                                        <textarea class="form-control" name="body"
                                                  placeholder="">{{old('body')}}</textarea>

                                        <input type="hidden" name="user_id" value="">
                                    </div>
                                </div>


                                <div class="col-md-12 mt-1 ">
                                    <div class="file-upload">
                                        <label for="file" class="file-upload__label bg-blue">
                                            ضمیمه کردن فایل</label>
                                        <input id="file" class="file-upload__input" type="file" name="file">
                                    </div>

                                </div>


                                <div class="col-md-12 mt-2 ">
                                    <button class="btn btn-primary btn-lg full-width">ارسال تیکت</button>
                                </div>
                            </form>

                        </div>


                    </div>

                </div>


            </div>

            @include('user.sections.profileSidebar')
        </div>
    </div>
@endsection

@section('script')

@endsection
