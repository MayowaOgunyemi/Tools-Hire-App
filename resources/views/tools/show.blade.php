<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $tool->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- <ul>
                <div class="flex gap-5 ">
                    <a href="{{ route('tool', ['tool' => $tool->name]) }}">
                    <div class="flex flex-col text-white font-semibold bg-gray-700 hover:bg-gray-800 cursor-pointer rounded-2xl p-2 ">
                        <li class="text-lg">{{ $tool->name }}</li>
                        <span>Category: {{ $tool->category->name }}</span>
                        <img src="{{ asset('img/rocket.png') }}" class="w-fit" alt="{{ $tool->description }}">
                    </div>
                    </a>
            </ul> --}}
            <div class="container-fluid mt-2 mb-3">
                <div class="row no-gutters">
        
                    <div class="col-md-5 pr-2">
                        <div class="card">
                            <div class="demo">
                                {{-- @php $image = explode('|', $dataArr->images ?? []); @endphp
                                <ul id="lightSlider">
                                    @for ($i = 0; $i < count($image); $i++) <li data-thumb="{{url('images/equipment/'.$image[$i])}}"> <img src="{{url('images/equipment/'.$image[$i])}}" class="img-fluid" alt="..." /> </li>
                                        @endfor
                                </ul> --}}
                            </div>
                        </div>
                        <div class="card mt-2">
                            <h6>Reviews</h6>
                            <div class="d-flex flex-row">
                                <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1 font-weight-bold">4.6</span>
                            </div>
                            <hr>
                            <div class="badges"> <span class="badge bg-dark ">All (230)</span> <span class="badge bg-dark "> <i class="fa fa-image"></i> 23 </span> <span class="badge bg-dark "> <i class="fa fa-comments-o"></i> 23 </span> <span class="badge bg-warning"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="ml-1">2,123</span> </span> </div>
                            <hr>
                            <div class="comment-section">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center"> <img src="" class="img-fluid" alt="..." class="rounded-circle profile-image">
                                        <div class="d-flex flex-column ml-1 comment-profile">
                                            <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Lori Benneth</span>
                                        </div>
                                    </div>
                                    <div class="date"> <span class="text-muted">2 May</span> </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center"> <img src="" class="img-fluid" alt="..." class="rounded-circle profile-image">
                                        <div class="d-flex flex-column ml-1 comment-profile">
                                            <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Timona Simaung</span>
                                        </div>
                                    </div>
                                    <div class="date"> <span class="text-muted">12 May</span> </div>
                                </div>
                            </div>
                            <hr>
                            <button>Add Review</button>
                        </div>
                    </div>
        
                    <div class="col-md-7">
                        <div class="card">
                            <div class="d-flex flex-row align-items-center">
                                <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ms-1">5.0</span>
                            </div>
                            @if (Auth::user()->role == (1 or 2))
                            <div>
                                <a href="{{('/admin/edit-equi-view/3')}}" class="btn btn-secondary btn-sm" style="position: absolute; right: 15px; top: 15px;">Edit</a>
                            </div>
                            @endif
                            <div class="mb-3">
                                <h2>{{$dataArr->equipment_name ??'hammer'}}</h2>
                                <div class="d-flex flex-row align-items-center me-2">
                                    <h4>£{{$tool->cost}}</h4>
                                    <h6>(per day)</h6>
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <div class="d-flex flex-row">
                                    <h6>Rental Duration</h6>
                                </div>
        
                                <form class="my-3" id="dateCal_id" onchange="saveDate()">
                                    @csrf
                                    <input type="hidden" value="{{$tool->cost}}" id="price" name="price">
                                    <label>from</label>
                                    <input type="date" id="from" name="from">
                                    <label>to</label>
                                    <input type="date" id="to" name="to">
                                </form>
                                <h6>Totale Price - <samp id="output"></samp></h6>
                            </div>
        
                            <div class="buttons"> <button class="btn btn-outline-primary">Add to Cart</button> <button class="btn btn-primary">Buy it Now</button> <button class="btn btn-light wishlist"> <i class="fa fa-heart"></i> </button> </div>
                            <hr>
                            <div class="product-description">
                                <div><span class="font-weight-bold">Color:</span><span> blue</span></div>
                                <div class="my-color"> <label class="radio"> <input type="radio" name="gender" value="MALE" checked> <span class="red"></span> </label> <label class="radio"> <input type="radio" name="gender" value="FEMALE"> <span class="blue"></span> </label> <label class="radio"> <input type="radio" name="gender" value="FEMALE"> <span class="green"></span> </label> <label class="radio"> <input type="radio" name="gender" value="FEMALE"> <span class="orange"></span> </label> </div>
                                <div class="d-flex flex-row align-items-center"> <i class="fa fa-calendar-check-o"></i> <span class="ml-1">Delivery within 1 houre</span> </div>
                                <div class="mt-2"> <span class="font-weight-bold">Description</span>
                                    <p>{{$tool->description}}</p>
                                    <div class="bullets">
                                        <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Best in Quality</span> </div>
                                        <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Anti-creak joinery</span> </div>
                                        <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Sturdy laminate surfaces</span> </div>
                                        <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Relocation friendly design</span> </div>
                                        <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">High gloss, high style</span> </div>
                                        <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Easy-access hydraulic storage</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>