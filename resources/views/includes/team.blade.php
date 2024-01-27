<!-- Team Start -->
<div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Popular Teachers</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                        eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="row g-4">                 
                    
                    @php ($time=["0.1s","0.3s","0.5s"])
                    @php ($counter=0)
                       @foreach ($teachers as $data)
                       <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{$time[$counter]}}">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="{{ asset('assets/img/'.$data->image) }}" alt="">
                            <div class="team-text">
                                <h3>{{$data->name}}</h3>
                                <p>{{$data->designation}}</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    @if($counter==2)
                    @php($counter=0)
                    @else
                    @php($counter+=1)
                    @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->