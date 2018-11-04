@extends('layouts.app')

@section('content')
@if(Auth::user()->pharmacy!=null)
<h3 class="text-center" style="color:#fff">
    {{ Auth::user()->pharmacys->name }}
</h3>


<div class="container">
        <div class="row justify-content-center">


                <div class="col-md-12">
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
                        <h4 class="" style="color: #fff;float:right"> الأدوية المتوفرة في الصيدلية </h4>
                        <a href="/dr_report/{{  Auth::user()->pharmacys->id }}/id" class="btn btn-xs btn-default text-primary " style="font-size:15px">  التقارير</a>
                        <div class="table-responsive">


                              <table id="mytable" class="table table-bordred table-striped">

                                   <thead style="background:#42424242">

                                   <th class="text-center" ><input type="checkbox" id="checkall" /></th>
                                   <th class="text-center" style="color: #fff">أسم الدواء </th>
                                   <th class="text-center" style="color: #fff">أسم الدواء التجاري </th>
                                    <th class="text-center" style="color: #fff">الأستخدام </th>
                                     <th class="text-center" style="color: #fff">الأعراض الجانبية</th>
                                     <th class="text-center" style="color: #fff">حالة الدواء</th>
                                      <th class="text-center" style="color: #fff">Edit</th>

                                       <th class="text-center" style="color: #fff">Delete</th>
                                   </thead>
                    <tbody>

                        @foreach ($c= App\drugs::where("pharmacy",Auth::user()->pharmacys->id)->paginate(5) as $item)
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

                    <td class="text-center" style="color: #fff"><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs" href="drugs/{{ $item->id }}/edit" >edit</a></p></td>
                    <td class="text-center" style="color: #fff"><p data-placement="top" data-toggle="tooltip" title="Delete"><a class="btn btn-danger btn-xs" data-title="Delete" href="drugs/{{ $item->id }}/delete"  >delete</a></p></td>           </tr>
                    @endforeach

                    </tbody>
    {{ $c->links() }}
                </table>
                    </div>
                    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-xs" style="color:#fff;background:#42424242" data-toggle="modal" data-target="#myModal">إضافة دواء</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">


                <div class="card" style="opacity: 0.9;">
                        <div class="card-header " ><h3 class="text-center">إضافة دواء للصيدلية</h3></div>

                        <div class="card-body">



                            <form action="{{ Route('drugs.store') }}" method="post">

                            {{ csrf_field() }}
                            <label for="" class="col-md-4 control-label"></label>
                            <input  type="text" name="name" value="" class="form-control"  placeholder="أسم الدواء" required>
                            <label for="" class="col-md-4 control-label"></label>

                            <input  type="text" name="m_name" value="" class="form-control"  placeholder="الأسم التجاري" required>
                            <label for="" class="col-md-4 control-label"></label>
                            <input  type="text" name="uses" value="" class="form-control"  placeholder="الأستخدام " required><br>
                            <input  type="text" name="side_effect" value="" class="form-control"  placeholder="الأعراض الجانبية " required><br>
                            <input  type="hidden" name="pharmacy" value="{{ Auth::user()->pharmacys->id }}" class="form-control"  placeholder="الأعراض الجانبية " required><br>


        <center>
                            <button type="submit" class="btn btn-success">حفظ</button>
        </center>
                    </form>
                        </div>
                    </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
                </div>

            <div class="col-md-8">

            </div>
        </div>
    </div>

@else
<div class="container">
    <div class="row justify-content-center">


            <div class="col-md-12">
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
                    <h4 class="" style="color: #fff;float:right">بيانات الصيدليات </h4>
                    <a href="/ph_report" class="btn btn-xs btn-default text-primary " style="font-size:15px">  التقارير</a>
                    <div class="table-responsive">


                          <table id="mytable" class="table table-bordred table-striped">

                               <thead style="background:#42424242">

                               <th class="text-center" ><input type="checkbox" id="checkall" /></th>
                               <th class="text-center" style="color: #fff">الأسم</th>
                                <th class="text-center" style="color: #fff">الوصف</th>
                                 <th class="text-center" style="color: #fff">ارقام التواصل</th>
                                 <th class="text-center" style="color: #fff">المستخدمين</th>
                                  <th class="text-center" style="color: #fff">Edit</th>

                                   <th class="text-center" style="color: #fff">Delete</th>
                               </thead>
                <tbody>

                    @foreach ($c= App\pharmacy::paginate(5) as $item)
                <tr style="background:#42424242">
                <td class="text-center" style="color: #fff">#</td>
                <td class="text-center" style="color: #fff">{{ $item->name}}</td>
                <td class="text-center" style="color: #fff"><b> {{ $item->disc}}</b></td>
                <td class="text-center" style="color: #fff">{{ $item->phone_no}}</td>
                 <td class="text-center" style="color: #fff"> <a style="color: #fff" href="/show_user/{{ $item->id}}"> {{ $item->user->count() }} مستخدم </a> </td>
                <td class="text-center" style="color: #fff"><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs"  href="Pharmacy/{{ $item->id }}/edit"  >edit</a></p></td>
                <td class="text-center" style="color: #fff"><p data-placement="top" data-toggle="tooltip" title="Delete"><a class="btn btn-danger btn-xs" href="Pharmacy/{{ $item->id }}/delete"  >delete</a></p></td>           </tr>
                @endforeach

                </tbody>
{{ $c->links() }}
            </table>
                </div>
                <!-- Trigger the modal with a button -->
<a href="/create_ph" class="btn btn-info btn-xs" style="color:#fff;background:#42424242" >إضافة صيدلية</a>


            </div>


        <div class="col-md-8">

        </div>
    </div>
</div>
@endif
@endsection
