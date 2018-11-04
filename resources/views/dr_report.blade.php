@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">


            <div class="col-md-12">
                    <h4 class="" style="color: #fff;float:right">تقرير الأدوية  </h4>
                    <span style="float:left;color:#fff"> {{ Auth::user()->pharmacys->name }}</span>
                    <div class="table-responsive">


                          <table id="mytable" class="table table-bordred table-striped">

                                <thead style="background:#42424242">

                                        <th class="text-center" ><input type="checkbox" id="checkall" /></th>
                                        <th class="text-center" style="color: #fff">أسم الدواء </th>
                                        <th class="text-center" style="color: #fff">أسم الدواء التجاري </th>
                                         <th class="text-center" style="color: #fff">الأستخدام </th>
                                          <th class="text-center" style="color: #fff">الأعراض الجانبية</th>
                                          <th class="text-center" style="color: #fff">حالة الدواء</th>

                                        </thead>
                         <tbody>

                             @foreach ($c= App\drugs::where("pharmacy",$id)->paginate(5) as $item)
                         <tr style="background:#42424242">
                         <td class="text-center" style="color: #fff">#</td>
                         <td class="text-center" style="color: #fff">{{ $item->name}}</td>
                         <td class="text-center" style="color: #fff">{{ $item->m_name}}</td>
                         <td class="text-center" style="color: #fff"><b> {{ $item->uses }}</b></td>
                         <td class="text-center" style="color: #fff">{{ $item->side_effect}}</td>
                         <td class="text-center" style="color: #fff">
                             @if ( $item->status == 1)
                             {{ "متوفر" }}
                             @else
                             {{ "غير متوفر" }}
                             @endif
                         </td>
                  @endforeach

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
