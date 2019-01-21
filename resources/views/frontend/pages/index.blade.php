
@extends('frontend.layouts.main')

@section('content')
    <!-- Modal -->
    <div class="modal" id="wfDemo" tabindex="-1" role="dialog" aria-labelledby="wfDemoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="wfDemoTitle"><img src="{{ asset('img/wearfits_logo.png') }}" alt="WearFits" style="height: 35px" />
                        <span class="sm">DEMO</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselWF" class="carousel slide" data-keyboard="false" data-wrap="false" data-ride="false">
                        <div class="carousel-inner">
                            <!-- SLIDE 1 -->
                            <div class="carousel-item active">
                                <div class="container-fluid">
                                    <div class="row justify-content-around">
                                        <!-- LEFT COLUMN -->
                                        <div class="col-5-lg col-10-md">
                                            <form>
                                                <!-- HEADER -->
                                                <div class="row">
                                                    <div class="col-12 text-center sm text-uppercase font-weight-bold">YOUR PROFILE</div>
                                                </div>
                                                <!-- SIZE NUMBERS -->
                                                <div class="row py-1 mt-3">
                                                    <div class="col-lg">
                                                        <div class="row form-group align-items-center">
                                                            <label for="height" class="col-4 col-form-label">Height</label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control-lg height noglow" id="height" placeholder="cm" value="165">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="row form-group align-items-center">
                                                            <label for="weight" class="col-4 col-form-label">Size</label>
                                                            <div class="col-8">
                                                                <div class="styled-select">
                                                                    <select class="form-control-lg noglow" id="avatarSize">
                                                                        <option>34</option>
                                                                        <option>36</option>
                                                                        <option selected>38</option>
                                                                        <option>40</option>
                                                                        <option>42</option>
                                                                    </select>
                                                                </div>
                                                                <!-- <input type="text" class="form-control-lg weihei" id="weight" placeholder="kg"> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- SIZE SLIDERS -->
                                                <div class="row py-1 mt-3">
                                                    <div class="col-6">Chest</div>
                                                    <div id="shoulders" class="col-6 text-right b">90 cm</div>
                                                </div>
                                                <div class="row align-items-center py-1">
                                                    <div class="col-1 sm">50</div>
                                                    <div class="col">
                                                        <input type="range" min="50" max="150" value="90" class="slider" id="shouldersRange">
                                                    </div>
                                                    <div class="col-1 text-right sm">150</div>
                                                </div>
                                                <div class="row py-1 mt-3">
                                                    <div class="col-6">Waist</div>
                                                    <div id="waist" class="col-6 text-right b">60 cm</div>
                                                </div>
                                                <div class="row align-items-center py-1">
                                                    <div class="col-1 sm">50</div>
                                                    <div class="col">
                                                        <input type="range" min="50" max="150" value="60" class="slider" id="waistRange">
                                                    </div>
                                                    <div class="col-1 text-right sm">150</div>
                                                </div>
                                                <div class="row py-1 mt-3">
                                                    <div class="col-6">Hips</div>
                                                    <div id="hips" class="col-6 text-right b">100 cm</div>
                                                </div>
                                                <div class="row align-items-center py-1">
                                                    <div class="col-1 sm">50</div>
                                                    <div class="col">
                                                        <input type="range" min="50" max="150" value="100" class="slider" id="hipsRange">
                                                    </div>
                                                    <div class="col-1 text-right sm">150</div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- RIGHT COLUMN -->
                                        <div class="col-5-lg text-center d-none d-lg-block">
                                            <div class="sm text-uppercase font-weight-bold">BODY TYPE</div>
                                            <div class="bodytype py-1 mt-3" id="titleSil">Hourglass</div>
                                            <div class="mx-auto">
                                                <img id="silImg" class="img-fluid" src="{{ asset('img/sil/hourglass.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SLIDE 2 -->
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 text-center sm text-uppercase font-weight-bold">SELECT ITEM</div>
                                    </div>
                                    <div class="row">
                                        <!-- Slider main container -->
                                        <div class="swiper-container">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                            </div>
                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="size-buttons" id="sizes">
                                                <a href="#">XS</a>
                                                <a href="#">M</a>
                                                <a href="#">XL</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SLIDE 3 -->
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 text-center sm text-uppercase font-weight-bold">VISUALIZATION</div>
                                    </div>
                                    <div class="row justify-content-around py-1 mt-3 sm">
                                        <div class="col-2-lg d-none d-xl-block">
                                            <div class="card">
                                                <div class="card-header bg-transparent font-weight-bold text-uppercase">
                                                    ITEM
                                                </div>
                                                <img id="item" class="card-img mx-auto py-2" src="" style="width: 100px" alt="">
                                            </div>
                                            <div class="card mt-4">
                                                <div class="card-header bg-transparent font-weight-bold text-uppercase">
                                                    PROFILE
                                                </div>
                                                <div class="card-body bg-transparent">
                                                    <div class="row">
                                                        <div class="col label">Height</div>
                                                        <div class="col text-right" id="profileHeight">150 cm</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col label">Size</div>
                                                        <div class="col text-right" id="profileSize">M</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-transparent">
                                                    <div class="row">
                                                        <div class="col label">Shoulders</div>
                                                        <div class="col text-right" id="profileShoulders">90 cm</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col label">Waist</div>
                                                        <div class="col text-right" id="profileWaist">60 cm</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col label">Hips</div>
                                                        <div class="col text-right" id="profileHips">100 cm</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-transparent">
                                                    <div class="row">
                                                        <div class="col label">Silhuett.</div>
                                                        <div class="col text-right" id="profileSil">Hourglass</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col content3d">

                                            <div style="position:absolute;right:0;top:-35px;z-index:4;width:80px">
                                                <div onclick="wearfits.toggleStrainMap(this)" class="pag-visited page-link" style="display:inline-block;float:right">COMFORT</div>
                                                <div onclick="wearfits.downloadAR(this)" id="show_ar_button" class="pag-visited page-link" style="display:none;float:right;;margin-top:5px">AR</div>
                                            </div>

                                            <div style="position:absolute;left:0;top:-35px;z-index:4;width:100px">
                                                <div onclick="wearfits.toggleTheme(this)" class="pag-visited page-link" style="display:inline-block">BACKGROUND</div>
                                                <div onclick="wearfits.toggleFrontBack(this)" class="pag-visited page-link" style="display:inline-block;margin-top:5px">FRONT/BACK</div>
                                                <div onclick="wearfits.toggleRotation(this)" class="pag-visited page-link" style="display:inline-block;margin-top:5px">ROTATION</div>
                                                <div onclick="wearfits.toggleZoom(this)" class="pag-visited page-link" style="display:inline-block;margin-top:5px">ZOOM</div>
                                            </div>

                                            <div id="wearfits_viewer" style="width:100%;height:100%"></div> <!-- canvas inside -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="pag-prev page-item disabled">
                                <a class="page-link text-center" href="#carouselWF" tabindex="-1" data-slide="prev">Previous</a>
                            </li>
                            <li class="page-item nr">
                                <a class="page-link text-center pag-1 pag-active" data-target="#carouselWF" data-slide-to="0" href="#">1</a>
                            </li>
                            <li class="page-item nr">
                                <a class="page-link text-center pag-2" data-target="#carouselWF" data-slide-to="1" href="#">2</a>
                            </li>
                            <li class="page-item nr">
                                <a class="page-link text-center pag-3" data-target="#carouselWF" data-slide-to="2" href="#">3</a>
                            </li>
                            <li class="pag-next page-item">
                                <a class="page-link text-center" href="#carouselWF" data-slide="next">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
