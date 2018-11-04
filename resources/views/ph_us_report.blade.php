@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">


            <div class="col-md-12">
                    <h4 class="" style="color: #fff;float:right">تقرير المستخدمين </h4>

                    <div class="table-responsive">


                            <table id="mytable" class="table table-bordred table-striped">

                                 <thead>

                                 <th class="text-center" ></th>
                                 <th class="text-center" style="color: #fff">الأسم</th>
                                  <th class="text-center" style="color: #fff">البريد الإلكتروني</th>

                                   <th class="text-center" style="color: #fff">تاريخ الإضافة</th>

                                 </thead>
                  <tbody>
  @foreach (App\User::where('pharmacy',$id )->get() as $user)

  <tr class="ttr" style="color: #fff" style="background:#42424242;opacity: 0.9;">
  <td class="text-center" >#</td>
  <td class="text-center" >{{ $user->name }}</td>
  <td class="text-center" >{{ $user->email }}</td>
  <td class="text-center" >{{ $user->created_at }}</td>

  </tr>
  @endforeach
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
