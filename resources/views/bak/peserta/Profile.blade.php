@extends('layouts/dashb')

@section('title','CiteUp 2019 | Peserta')

@section('content')

<div class="col-lg-8">
  <div class="row">
    <div class="col-lg-12">
      <div class=""> <!-- class="card"
        <div class="card-header bg-white">
          <i class="fa fa-file-text-o"></i>
          General Wizard
        </div>-->
        <div class="card-block m-t-20">
          <div id="rootwizard_no_val">
            <ul class="nav nav-pills">
              <li class="nav-item user1 m-t-15">
                <a class="nav-link" href="#tab11" data-toggle="tab"><span
                  class="userprofile_tab">1</span>User
                  profile</a>
                </li>
                <li class="nav-item user2 m-t-15">
                  <a class="nav-link profile_details" href="#tab21"
                  data-toggle="tab"><span class="profile_tab">2</span>Profile
                  details</a>
                </li>
                <li class="nav-item finish_tab m-t-15">
                  <a class="nav-link " href="#tab31" data-toggle="tab"><span>3</span>Finish</a>
                </li>
              </ul>
              <div class="tab-content m-t-20">
                <div class="tab-pane" id="tab11">
                  <div class="form-group">
                    <label for="userName1" class="col-form-label">User name</label>
                    <input id="userName1" type="text" placeholder="Enter your name"
                    class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email1" class="col-form-label">Email</label>
                    <input id="email1" placeholder="Enter your Email" type="text"
                    class="form-control email">
                  </div>
                  <div class="form-group">
                    <label for="password1" class="col-form-label">Password</label>
                    <input id="password1" type="password"
                    placeholder="Enter your password"
                    class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="confirm1" class="col-form-label">Confirm Password</label>
                    <input id="confirm1" type="password"
                    placeholder="Confirm your password "
                    class="form-control">
                  </div>
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <li class="previous previous_btn1"><a>Previous</a></li>
                    <li class="next next_btn1"><a>Next</a></li>
                  </ul>
                </div>
                <div class="tab-pane active" id="tab21">
                  <div class="form-group">
                    <label for="name" class="col-form-label">First name</label>
                    <input id="name" name="fname" placeholder="Enter your First name"
                    type="text" class="form-control required">
                  </div>
                  <div class="form-group">
                    <label for="surname" class="col-form-label">Last name</label>
                    <input id="surname" name="lname" type="text"
                    placeholder=" Enter your Last name"
                    class="form-control required">
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="custom-select form-control"
                    title="Select an account type...">
                    <option>Select</option>
                    <option>MALE</option>
                    <option>FEMALE</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="address1">Address</label>
                  <input id="address1" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="age1" class="col-form-label">Age</label>
                  <input id="age1" name="age" type="text" maxlength="3"
                  class="form-control number general_number">
                </div>
                <ul class="pager wizard pager_a_cursor_pointer">
                  <li class="previous previous_btn2"><a>Previous</a></li>
                  <li class="next next_btn2"><a>Next</a></li>
                </ul>
              </div>
              <div class="tab-pane" id="tab31">
                <div class="form-group">
                  <label>Home number</label>
                  <input type="text" class="form-control general_number" placeholder="(999)999-9999">
                </div>
                <div class="form-group">
                  <label>Personal number</label>
                  <input type="text" class="form-control general_number" placeholder="(999)999-9999">
                </div>
                <div class="form-group">
                  <label>Alternate number</label>
                  <input type="text" class="form-control general_number" placeholder="(999)999-9999">
                </div>
                <div class="form-group">
                  <span>Terms and Conditions </span>
                  <br>
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> I agree with the Terms and Conditions.</span>
                  </label>
                </div>
                <ul class="pager wizard pager_a_cursor_pointer">
                  <li class="previous previous_btn3"><a>Previous</a></li>
                  <li class="next"><a>Finish</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection