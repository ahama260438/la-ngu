@extends('layouts.app_index')
@section('content')


<h1 class="header-w3ls">
    วิทยาลัยการอาชีพละงู
 </h1>
  <h2 class="header-w3ls">
    LA-NGU INDUSTRIAL AND COMMUNITY EDUCATIN COLLEGE
 </h2>
 <!-- multistep form -->
 <div class="main-bothside">
  @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{session()->get('message') }}</strong>
          </div>
@endif
    <form  method="post" action="{{action('PageController@add_data')}}">
      {{csrf_field()}}
        <div class="personal-info">
          <center>
             <div class="form-check">
                <input class="form-check-input" name="type" type="radio"  value="ปวช" required="">
                <label class="form-check-label">
                ปวช
                </label>
                <input class="form-check-input" type="radio" name="type" value="ปวส" required="">
                <label class="form-check-label">
                ปวส
                </label>
             </div>
          </center>
       </div>
       <div class="form-group">
          <div class="form-mid-w3ls">
             <input type="text" name="title"  placeholder="คำนำหน้าชื่อ" required="">
          </div>
          <div class="form-mid-w3ls">
             <input type="text" name="name" placeholder="ชื่อ" required="">
          </div>
          <div class="form-mid-w3ls">
             <input type="text" name="lastname" placeholder="นามสกุล" required="">
          </div>
       </div>
       <div class="form-group">
          <div class="form-mid-w3ls">
             <input type="text" name="school" placeholder="จบจากที่ไหน" required="">
          </div>
          <div class="form-mid-w3ls">
             <input type="text" name="department" placeholder="แผนก" required="">
          </div>
          <div class="form-mid-w3ls">
             <input type="hidden"  >
          </div>
       </div>

       <button type="submit" value="add_data" name="add_data">สมัคร</button>
    </form>
 </div>

@endsection
