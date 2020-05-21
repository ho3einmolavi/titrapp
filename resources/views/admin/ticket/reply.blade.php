@extends('admin.layout')
@section('title', 'پاسخ ها')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('ticket.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                        <li class="breadcrumb-item active">پاسخ ها</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست مکالمات</h3>

                            <div class="card-tools">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    @foreach($data['replys'] as $reply)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                     src="{{!empty($reply->user->image) ? \Illuminate\Support\Facades\Storage::url($reply->user->image) :'/theme/img/user.png' }}" alt="user image">
                                                <span class="username">
                                                     <a href="#">
                                                         @if (!empty($reply->user->name))
                                                             {{$reply->user->name}}

                                                         @else
                                                             {{$reply->user->phone}}
                                                         @endif
                                                     </a>
                                            </span>
                                                <span style="padding-top: 7px"
                                                      class="description">{{\Morilog\Jalali\Jalalian::forge($reply->created_at)->format('Y-m-d : h:i:s')}}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p style="padding-right: 11px;">
                                                {{$reply->body}}
                                            </p>

                                            <p>

                                                @if (!empty($reply->file))
                                                    <a href="{{\Illuminate\Support\Facades\Storage::url($reply->file)}}" target="_blank"
                                                       class="link-black text-sm mr-2"><i
                                                                class="fa fa-download mr-1"></i> دانلود ضمیمه</a>
                                                @endif


                                            </p>

                                        </div>
                                    @endforeach


                                </div>

                            </div>

                        </div>
                    </div>
                    <div >
                        {!! $data['replys']->render() !!}
                    </div>
                </div>

            </div>

        </div>
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">پاسخ</h3>
                            <br/>
                            @include('admin.sections.errors')

                            <div class="card-tools">

                            </div>
                        </div>

                        <form class="form-horizontal" action="{{ route('addReply',$data['id']) }}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    <Textarea style="height: 200px" class="form-control" name="body"></Textarea>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputFile">ضمیمه(عکس)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label class="custom-file-label"
                                                       for="exampleInputFile">ضمیمه(عکس)</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id=""><i class="fa fa-upload"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال تیکت</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection


@section('script')

    <script>
        $('html,body').animate({scrollTop: document.body.scrollHeight},"slow");

    </script>
@endsection
