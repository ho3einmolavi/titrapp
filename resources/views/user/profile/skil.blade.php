@extends('front.frontLayout')
@section('title', 'ژانر و تخصص ها')

@section('style')

@endsection

@section('content')


    @include('user.sections.profileHeader')
    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

                @if(!empty(\Illuminate\Support\Facades\DB::table('category_user')->where('user_id',$user->id)->first()->id))
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">ژانر و تخصص ها</h6>
                        </div>
                        <div class="ui-block-content">
                            <form class="form-horizontal" action="{{route('updateSkil')}}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label>تخصص های خود را انتخاب کنید (حداکثر 2 مورد انتخاب شود)</label>
                                            <select class="form-control select2" name="skil[]" multiple="multiple"
                                                    data-placeholder=" تخصص های خود را انتخاب کنید"
                                                    style="height: 300px;">
                                                @foreach(\App\Skil::whereIn('category_id',$user->categories->pluck('id')->toArray())->get() as $skil)
                                                    <option value="{{$skil->id}}" {{ in_array(trim($skil->id) , $user->skils->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $skil->name }} </option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label>ژانر های تخصصی خود را انتخاب کنید (حداکثر 2 مورد انتخاب شود)</label>
                                            <select class="form-control select2" name="genre[]" multiple="multiple"
                                                    data-placeholder=" ژانر های تخصصی خود را انتخاب کنید"
                                                    style="height: 300px;">
                                                @foreach(\App\Genre::whereIn('category_id',$user->categories->pluck('id')->toArray())->get() as $genre)
                                                    <option value="{{$genre->id}}" {{ in_array(trim($genre->id) , $user->genres->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $genre->name }} </option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button class="btn btn-primary btn-lg full-width">ثبت تغییرات</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    @else

                    <div class="alert alert-danger">
                        <p>
                               لطفا ابتدا زمینه کاری خود را در اطلاعات پروفایل ثبت نمایید سپس برای انتخاب ژانر و تخصص های خود اقدام کنید. <a href="/user/profile">ثبت زمینه کاری</a>
                        </p>
                    </div>
                @endif
            </div>


            @include('user.sections.profileSidebar')
        </div>
    </div>

@endsection

@section('script')

@endsection
