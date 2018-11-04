
@extends('layouts.app')
@section('content')
<style>
    /* The switch - the box around the slider */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
<!-- Modal -->
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">


            <div class="card" style="opacity: 0.9;">
                    <div class="card-header " ><h3 class="text-center">تعديل بيانات الدواء</h3></div>

                    <div class="card-body">



                        <form action="/drugs/{{ $data->id }}/update" method="post">
                            @method("put")
                        {{ csrf_field() }}
                        <label for="" class="col-md-4 control-label"></label>
                        <input  type="text" name="name" value="{{ $data->name }}" class="form-control"  placeholder="أسم الدواء" required>
                        <label for="" class="col-md-4 control-label"></label>

                        <input  type="text" name="m_name" value="{{ $data->m_name }}" class="form-control"  placeholder="الأسم التجاري" required>
                        <label for="" class="col-md-4 control-label"></label>
                        <input  type="text" name="uses" value="{{ $data->uses }}" class="form-control"  placeholder="الأستخدام " required><br>
                        <input  type="text" name="side_effect" value="{{ $data->side_effect }}" class="form-control"  placeholder="الأعراض الجانبية " required><br>
                        <input  type="hidden" name="pharmacy" value="{{ Auth::user()->pharmacys->id }}" class="form-control"  placeholder="الأعراض الجانبية " required><br>

    <center>
            متوفر
            <label class="switch">
              <input type="checkbox" name="status" value="1">
              <span class="slider round"></span>
            </label>
غير متوفر
<br>
<br>
        <button type="submit" class="btn btn-success">حفظ</button>
    </center>
                </form>
                    </div>
                </div>


      </div>
      <div class="modal-footer">
            <a href="/home" class="btn btn-danger" data-dismiss="modal">رجوع</a>
        </div>
    </div>

  </div>
</div>

@endsection
