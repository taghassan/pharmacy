@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">


            <div class="col-md-12">
                    <h4 class="" style="color: #fff;float:right">تقرير الصيدليات </h4>
                    <div class="table-responsive">


                          <table id="mytable" class="table table-bordred table-striped">

                               <thead>

                               <th class="text-center" ></th>
                               <th class="text-center" style="color: #fff">الأسم</th>
                                <th class="text-center" style="color: #fff">الوصف</th>
                                 <th class="text-center" style="color: #fff">ارقام التواصل</th>
                                 <th class="text-center" style="color: #fff">المستخدمين</th>

                               </thead>
                <tbody>
                        @foreach ($c= App\pharmacy::all() as $item)
                        <tr style="background:#42424242">
                        <td class="text-center" style="color: #fff">#</td>
                        <td class="text-center" style="color: #fff">{{ $item->name}}</td>
                        <td class="text-center" style="color: #fff"><b> {{ $item->disc}}</b></td>
                        <td class="text-center" style="color: #fff">{{ $item->phone_no}}</td>
                         <td class="text-center" style="color: #fff">  {{ $item->user->count() }} مستخدم </td>                        @endforeach
                </tbody>

            </table>
                </div>

  </div>
  <a href="#" id="print" onclick="print()" class="btn btn-success m-2">إطبع</a>
  <a href="/home" id="back"  class="btn btn-danger m-2">رجوع</a>
</div>
            </div>



        <div class="col-md-8">

        </div>
    </div>
</div>
@endsection
