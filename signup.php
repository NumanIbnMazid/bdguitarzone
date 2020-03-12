<!--
Numan Ibn Mazid
NCC ID: 00160542
-->
<!DOCTYPE html>
<html lang="en">
    <!--head-area-->
      <?php include_once 'template/head.php' ?>
    <!--//head-area-->
  <body>

    <!--header-area-->
      <?php include_once 'template/header.php' ?>
    <!--//header-area-->
    <div class="well form-horizontal" id="contact_form">

          <div class="container" >
            <div class="card card-login mx-auto mt-5">
                <h4 style="margin-left: 30%; margin-top: 4px;">You must fill up the fields properly that are marked with * sign.</h4>
                <div class="container">
                  <div class="already" style="padding-top: 18px;">
                      <h4>Already have an account?<h3> <a href="login.php">Login Now »</a> </h3></h4>
                  </div>
                    <div class="row-fluid" id="register_form" name="register_form" style="background-color: #fefefe">
                    <fieldset>

                        <!-- Form Name -->
                        <legend><center><h2><b>Registration Form</b></h2></center></legend><br>

                        <!-- Text input-->

                        <div class="form-group">
                          <label class="col-md-4 control-label">First Name *</label>
                          <div class="col-md-4 inputGroupContainer">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input type="text" name="name" id="name" minlength="1" maxlength="14" placeholder="First Name..." class="form-control" value="" required=" " oninput="check(this)" autocomplete="off" />
                              </div>

                              <span id='message2' style="margin-left: -10px; font-size: 15px;"> </span>
                          </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Last Name *</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="lName" id="lName" minlength="1" maxlength="19" placeholder="Last Name..." class="form-control" value="" required=" " oninput="check(this)" autocomplete="off" />
                                </div>
                                <div class="error left-align" id="err-name">Please enter your last name...</div>
                                <span id='message3' style="margin-left: -10px; font-size: 15px;"> </span>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gender *</label>
                            <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="gender" id="gender" class="form-control selectpicker">
                                      <option value="M">Male</option>
                                      <option value="F">Female</option>
                                      <option value="O">Others</option>

                                    </select>
                                </div>
                                <div class="error left-align" id="err-name">Please select your gender...</div>
                                <span id='message4' style="margin-left: -10px; font-size: 15px;"> </span>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                          <label class="col-md-4 control-label">Date of Birth *</label>
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input type="text" name="age" id="age" class="form-control" value="" placeholder="Birth Date..." />
                            </div>
                              <div class="error left-align" id="err-name">Please enter your birth date...</div>
                              <span id='message12' style="margin-left: -10px;font-size: 15px;"> </span>
                          </div>
                        </div>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

                        <script>
                            $(document).ready(function(){
                                var date_input=$('input[name="age"]'); //our date input has the name "date"
                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                date_input.datepicker({
                                    format: 'yyyy/mm/dd',
                                    container: container,
                                    todayHighlight: true,
                                    autoclose: true,
                                })
                            })
                        </script>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Address *</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="address" id="address" minlength="2" maxlength="90" placeholder="Address..." required=" " class="form-control" value="" oninput="check(this)" autocomplete="off" />
                                </div>
                                <div class="error left-align" id="err-name">Please enter your address...</div>
                                <span id='message6' style="margin-left: -10px;font-size: 15px;"> </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Postal Code *</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="tel" name="post_cd" id="post_cd" minlength="4" maxlength="4" placeholder="Postal Code..." onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required=" " class="form-control" value="" autocomplete="off"/>
                                </div>
                                <div class="error left-align" id="err-name">Please enter valid postal code...</div>
                                <span id='message11' style="margin-left: -10px;font-size: 15px;"> </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label">Contact No. *</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input type="tel" id="mobile" name="mobile" size="20" minlength="11" maxlength="11" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="ex: 01685238317" required="" class="form-control" value="" oninput="check(this)" autocomplete="off"  />
                                </div>
                                <div class="error left-align" id="err-name">Must be 11 characters...</div>
                                <span id='message5' style="margin-left: -10px;font-size: 15px;"> </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >More About You</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <textarea placeholder="More About You..." class="form-control" name="more" id="more" maxlength="100" ></textarea>
                                </div>
                                <div class="error left-align" id="err-comment">Please enter more about you...</div>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label">E-Mail *</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" name="email" id="email" maxlength="59" placeholder="ex: numan@gmail.com" autofocus required pattern="[^ @]*@[^ @]*" required="" class="form-control" value="" oninput="check(this)" autocomplete="off" />
                                </div>
                                <div class="error left-align" id="err-email">Please enter valid email address...</div>
                                <span id='message7' style="margin-left: -10px;font-size: 15px;"> </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Password *</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="password" name="password" id="password" minlength="7" maxlength="24" placeholder="Please enter your password..." required=" " class="form-control" value="" oninput="check(this)" autocomplete="off" />
                                </div>
                                <div class="error left-align" id="err-name">Password must be at least 7 characters or more...</div>
                                <span id='message8' style="margin-left: -10px;font-size: 15px;"> </span>
                          </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Confirm Password *</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="password" name="conPassword" id="conPassword" placeholder="Please enter your password again..." required=" " class="form-control" value="" oninput="check(this)" autocomplete="off" />
                                </div>
                                <div class="error left-align" id="err-name">Password must be matching...</div>
                                <span id='message' style="margin-left: -10px;font-size: 15px;"> </span>
                          </div>
                        </div>
                        <!-- Text input-->

                        <!-- Submit Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label"></label>
                          <div class="col-md-4"><br>
                            <input class="submit_btn" name="sub" id="sub" type="submit" value="Submit" >
                          </div>
                        </div>

                        <span id='message10' style="margin-left: -10px;">
                        <div id="result"> </div>


                        <!--SIGN UP INFORMATION END-->
                    </fieldset>
                  </div>
                </div>
            </div>
              <!-- /.container -->
          </div>


    </div>
    <!-- footer -->
      <?php include_once 'template/footer.php' ?>     
    <!-- //footer --> 
    
  </body>

</html> 