<div class="container mt-5">
    <div class="row">

        @foreach(\App\Category::orderBy('sort' , 'ASC')->get() as $category)


            <div class="col-md-3 shadow-lg mb-3">
                <a href="/category/{{$category->id}}">


                    <div class="bg-white  text-center " style="padding: 30px; font-size: 24px; color: black;">
                        <div class="mb-2">
                            <img style="height: 75px;" src="{{$category->image}}" alt="">
                        </div>
                        {{$category->name}}

                        <p>
                            {{$category->description}}
                        </p>
                    </div>
                </a>
            </div>

        @endforeach


    </div>
</div>
