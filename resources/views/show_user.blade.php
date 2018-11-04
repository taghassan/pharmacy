@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">


            <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-success text-center" role="alert">
                       <center> {{ session('success') }} </center>
                    </div>
                @endif
                    <h5 class="" style="color: #fff;float:right"> <i class="fa fa-user"></i> مستخدمين الصيدليات </h5>
                    <a href="/ph_us_report/{{ $id }}" class="btn btn-xs btn-default text-primary " style="font-size:15px">  التقارير</a>

                    <div class="table-responsive">


                          <table id="mytable" class="table table-bordred table-striped">

                               <thead>

                               <th class="text-center" ></th>
                               <th class="text-center" style="color: #fff">الأسم</th>
                                <th class="text-center" style="color: #fff">البريد الإلكتروني</th>

                                 <th class="text-center" style="color: #fff">تاريخ الإضافة</th>
                                 <th class="text-center" style="color: #fff">Edit</th>

                                 <th class="text-center" style="color: #fff">Delete</th>
                               </thead>
                <tbody>
@foreach (App\User::where('pharmacy',$id )->get() as $user)

<tr class="ttr" style="color: #fff" style="background:#42424242;opacity: 0.9;">
<td class="text-center" >#</td>
<td class="text-center" >{{ $user->name }}</td>
<td class="text-center" >{{ $user->email }}</td>
<td class="text-center" >{{ $user->created_at }}</td>
 <td class="text-center" style="color: #fff"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >edit</button></p></td>
 <td class="text-center" style="color: #fff"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >delete</button></p></td>

</tr>
@endforeach



                <td class="text-center" style="color: #fff"><p data-placement="top" data-toggle="tooltip" title="user"><button style="background:#42424242" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#user" ><span class="fa fa-user"></span></button></p></td>

                </tbody>

            </table>
                </div>

  </div>
  <a href="#" id="print" onclick="print()" class="btn btn-success m-2">إطبع</a>
  <a href="/home" id="back"  class="btn btn-danger m-2">رجوع</a>
</div>
            </div>



        <div class="col-md-8">

                <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                          <center><h4 class="modal-title"  id="Heading">إضافة مستخدم للصيدلية</h4>
                        </div>
                            <div class="modal-body">

                                  <form method="POST" action="{{ route('user.store') }}" aria-label="{{ __('Register') }}">
                                          @csrf

                                          <div class="form-group row">

                                              <div class="col-md-12">
                                                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                  @if ($errors->has('name'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('name') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">

                                              <div class="col-md-12">
                                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                  @if ($errors->has('email'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('email') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">

                                              <div class="col-md-12">
                                                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                  @if ($errors->has('password'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('password') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">

                                              <div class="col-md-12">
                                                  <input id="password-confirm" type="hidden" class="form-control" name="pharmacy" value="{{ $id }}" required>
                                              </div>
                                          </div>

                                          <div class="form-group row mb-0">
                                              <div class="col-md-7 offset-md-5">
                                                  <button type="submit" class="btn btn-primary">
                                                      {{ __('حفظ') }}
                                                  </button>
                                              </div>
                                          </div>
                                      </form>

                          </div>
                      <!-- /.modal-content -->
                    </div>
                        <!-- /.modal-dialog -->
                      </div>
                      </div>


        </div>
    </div>
</div>
@endsection
