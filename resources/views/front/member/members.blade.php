@extends('front.frontLayout')
@section('title', 'اعضا')

@section('content')
    <div class="header-spacer "></div>


    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex1200">
                    <div class="ui-block-title">
                        <form action="/members" method="get">


                            <div class="w-select">

                                <div class="row">
                                    <div class="col-md-4  mt-3">
                                        <fieldset class="form-group">
                                            <label class="my-1 mr-2" for="city">استان</label>
                                            <select class=" custom-select dynamic" id="province" name="province">
                                                <option value="">استان  را انتخاب کنید</option>
                                                @foreach(\App\Province::orderBy('name')->get() as $province)
                                                    <option  value="{{$province->id}}" {{request('province') ==$province->id ? 'selected' : '' }}>{{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4  mt-3">
                                        <fieldset class="form-group">
                                            <label class="my-1 mr-2" for="city">شهر</label>
                                            <select class="custom-select  cityId" id="city" name="city">
                                                @if(request('province'))
                                                    @foreach(\App\City::where('province_id',request('province'))->get() as $city)
                                                        <option  value="{{$city->id}}" {{request('city') ==$city->id ? 'selected' : '' }}>{{$city->name}}</option>
                                                    @endforeach

                                                    @else
                                                    <option value="">لطفا ابتدا استان  را انتخاب کنید</option>

                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4  mt-3">
                                        <fieldset class="form-group">
                                            <label class="my-1 mr-2" for="category_id">زمینه کاری</label>
                                            <select class=" custom-select dynamicCategory "  name="category_id" id="category_id">
                                                <option value="">همه موارد</option>
                                                @foreach(\App\Category::all() as $category)
                                                    <option value="{{$category->id}}" {{request('category_id') ==$category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <br/>

                                    <div class="col-md-4 mt-3">
                                        <fieldset class="form-group">
                                            <label class="my-1 mr-2" for="city">ژانر</label>
                                            <select class="custom-select  genreId" id="genreId" name="genreId">
                                                @if(request('category_id'))

                                                    <option value="">همه موارد</option>
                                                    @foreach(\App\Genre::where('category_id',request('category_id'))->get() as $genre)
                                                        <option  value="{{$genre->id}}" {{request('genreId') ==$genre->id ? 'selected' : '' }}>{{$genre->name}}</option>
                                                    @endforeach

                                                @else
                                                    <option value="">لطفا ابتدا زمینه کاری  را انتخاب کنید</option>

                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-4 mt-3" >
                                        <fieldset class="form-group">
                                            <label class="my-1 mr-2" for="skilId">تخصص</label>
                                            <select class="custom-select skilId" id="skilId" name="skilId">
                                                @if(request('category_id'))
                                                    <option value="">همه موارد</option>

                                                @foreach(\App\Skil::where('category_id',request('category_id'))->get() as $skil)
                                                        <option  value="{{$skil->id}}" {{request('skilId') ==$skil->id ? 'selected' : '' }}>{{$skil->name}}</option>
                                                    @endforeach

                                                @else
                                                    <option value="">لطفا ابتدا زمینه کاری  را انتخاب کنید</option>

                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>



                                    <div class="col-md-12 mt-5 text-center">
                                        <button type="submit" class="btn btn-success btn-md-2">فیلتر کن</button>
                                        <a href="/members" class="btn btn-primary btn-md-2">حذف  فیلتر ها</a>
                                    </div>

                                </div>


                            </div>


                        </form>


                        <form action="">
                            {{csrf_field()}}

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                        <div class="h6 title">اعضای تیتر اَپ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">


            @if(count($users) > 0)
            @foreach($users as  $user_item)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    @include('front.sections.userBox')

                </div>
            @endforeach
                @else

                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <p>
                             کاربری با این مشخصات پیدا نشد <a href="/members">حذف فیلتر های موجود</a>
                        </p>
                    </div>
                </div>


            @endif


        </div>


        <div class="text-center">
            {!! $users
                ->appends( [
                'province'=>request('province'),
                'city'=>request('city'),
                'category_id'=>request('category_id'),
                'genreId'=>request('genreId'),
                'skilId'=>request('skilId'),
               ])
                ->render() !!}
        </div>
    </div>


    <div class="header-spacer header-spacer-small"></div>
    @include('front.sections.mainSections')




@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.dynamic').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{route('getCityByProvinceForSerach')}}",
                        method: "POST",
                        data: {
                            select: select, value: value,
                            _token: _token
                        },
                        success: function (result) {
                            console.log(result);
                            $('.cityId').html(result);
                        }

                    })

                }
            });
            $('.dynamicCategory').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{route('getSkilByCategory')}}",
                        method: "POST",
                        data: {
                            select: select, value: value,
                            _token: _token
                        },
                        success: function (result) {
                            console.log(result);
                            $('.skilId').html(result);
                        }

                    })

                }
            });
            $('.dynamicCategory').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{route('getGenreByCategory')}}",
                        method: "POST",
                        data: {
                            select: select, value: value,
                            _token: _token
                        },
                        success: function (result) {
                            console.log(result);
                            $('.genreId').html(result);
                        }

                    })

                }
            });
        });
    </script>



@endsection
