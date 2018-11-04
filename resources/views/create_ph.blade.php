
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('fonts/css/all.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body  style="background-image: url('{{ asset('img/1509786.jpg') }}'); background-size:cover">
        <div class=" position-ref full-height" style="box-shadow: 1px 1px 2px #fff;">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color:#fff" ref="{{ url('/home') }}">Home</a>
                    @else
                        <a style="color:#fff"  href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif
            <br>

            <!-- Modal -->
              <div class="modal-dialog  modal-lg" style="top:x50px;">

                <!-- Modal content-->
                <div class="modal-content" >
                  <div class="modal-header">
                        @if (session('success'))
                        <div class="alert alert-success text-center" role="alert">
                           <center> {{ session('success') }} </center>
                        </div>
                    @endif
                        @if (session('alert'))
                        <div class="alert alert-danger text-center" role="alert">
                           <center> {{ session('alert') }} </center>
                        </div>
                    @endif
                  </div>
                  <div class="modal-body">


                        <div class="card" style="opacity: 0.9;">
                                <div class="card-header " ><h3 class="text-center">إضافة صيدلية</h3></div>

                                <div class="card-body">

                                    <form action="{{ Route('Pharmacy.store') }}" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="alert alert-danger text-center"> <b> يجب التاكد من الموقع جيداً قبل الأدخال </b></div>
                                                  <div id="map" style="width:100%;height:300px;"></div>
                                            </div>

    <div class="col-md-6">

                                                {{ csrf_field() }}
                                                <label for="" class="col-md-4 control-label"></label>
                                                <input  dir="rtl" type="text" name="name" value="" class="form-control"  placeholder="أسم الصيدلية" required>
                                                <label for="" class="col-md-4 control-label"></label>

                                                <textarea  dir="rtl" type="text" name="disc" value="" class="form-control"  placeholder="الوصف" required></textarea>
                                                <label for="" class="col-md-4 control-label"></label>
                                                <input  dir="rtl" type="text" name="phone_no" value="" class="form-control"  placeholder="رقم التتواصل  " required><br>
                                              <input type="hidden" name="lon" id="longtitute" value="0">
                                              <input type="hidden" name="lat" id="latitute" value="0">
    </div>
                                    </div>
                                </div>

                                                <center>
                        <button type="submit" style="display:none" id="save" class="btn btn-success">حفظ</button>
                                                </center>
                                                            </form>
                            </div>


                  </div>
                  <div class="modal-footer">
                    <a href="/home" class="btn btn-danger" data-dismiss="modal">رجوع</a>
                  </div>
                </div>

              </div>
            </div>
</div>
            <script src='https://api.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
            <link href='https://api.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />

            <script>
              mapboxgl.accessToken = 'pk.eyJ1IjoidGFnaGFzc2FuMTIzIiwiYSI6ImNqbnlpbmJudjBkYzgzcHFvZW5kcm51OXYifQ.YjAjeqX-VFYPc24jtN10uQ';
              var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v10',
            center: [32.54149827650943, 15.587232698438243],
            zoom: 10
            });
            map.on('click', function(e) {
            $('#longtitute').val(e.lngLat.lng);
            $('#latitute').val(e.lngLat.lat);
            $('#save').show();
             new mapboxgl.Marker()
            .setLngLat([e.lngLat.lng, e.lngLat.lat])
            .addTo(map);
            });

            </script>
        </div>
    </body>
</html>



