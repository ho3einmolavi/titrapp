<div class="container mt-5">
    <div class="row">

        @foreach($category->genres as $genre)


            <div class="col-md-3 shadow-lg mb-3">
                {{--<a href="/category/{{$category->id}}">--}}


                <div class="bg-white  text-center " style="padding: 30px; font-size: 24px; color: black;">
                    <div class="mb-2">
                        {{--<img style="height: 75px;" src="{{$genre->image}}" alt="">--}}
                    </div>
                    {{$genre->name}}
                </div>

            </div>

        @endforeach


    </div>
</div>