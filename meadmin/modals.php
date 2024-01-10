<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Scholarly web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--// Meta tag Keywords -->
  <!-- css files -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/swipebox.css">
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <!-- //css files -->
  <!-- online-fonts -->
  <link href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
  <!-- //online-fonts -->
</head>
<style>
  .agileits-main input[type="text"],
  .agileits-main input[type="email"],
  .agileits-main input[type="date"],
  .agileits-main input[type="password"],
  .agileits-main select {
    font-size: 1em;
    color: #fff;
    padding: .9em 1em .9em 2.5em;
    margin: 1em 0 2em;
    outline: none;
    border: none;
    background: #002147;
    width: 105%;
  }
</style>

<body>
  <div class="modal fade" id="teacherAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div style="color: black; font-size: 1.1rem; font-weight: bold;" class="modal-header">
          You're Adding a Teacher:
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form id="add_teacher" class="mod2">
            <div class="row">
              <div class="col-md-6 col-xs-6 w3l-left-mk">
                <ul style="list-style-type: none;">
                  <li class="text">Name of Teacher : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><input id="full_name" name="t_name" type="text" required=""></li>
                  <li class="text">Date of Birth : </li>
                  <li class="agileits-main"><i class="fa fa-calendar" aria-hidden="true"></i><input class="date" id="datepicker" name="t_dob" type="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" /></li>
                  <li class="text">Gender : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><select id="gender" name="t_gender" type="text" required="">
                      <option selected disabled>--Select Gender</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select></li>
                  <li class="text">Subject : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><select id="gender" name="t_subject" type="text" required="">
                      <option selected disabled>--Select Subject</option>
                      <option>Mathematics</option>
                      <option>Integrated Science</option>
                      <option>Computing</option>
                      <option>Social Studies</option>
                      <option>English Language</option>
                      <option>Our World Our People</option>
                      <option>French</option>
                      <option>Literature</option>
                    </select></li>
                  <li class="text">Grade : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><select id="gender" name="t_grade" type="text" required="">
                      <option selected disabled>--Select Grade</option>
                      <option>Grade 1</option>
                      <option>Grade 2</option>
                      <option>Grade 3</option>
                      <option>Grade 4</option>
                      <option>Grade 5</option>
                      <option>Grade 6</option>
                      <option>Grade 7</option>
                      <option>Grade 8</option>
                      <option>Grade 9</option>
                      <option>Grade 10</option>
                    </select></li>
                  <li class="text">Email : </li>
                  <li class="agileits-main"><i class="fa fa-envelope" aria-hidden="true"></i><input id="mobile" name="t_email" type="email" required=""></li>
                </ul>
              </div>
              <div class="col-md-6 col-xs-6 w3l-right-mk">
                <ul style="list-style-type: none;">
                  <li class="text">Mobile no : </li>
                  <li class="agileits-main"><i class="fa fa-phone" aria-hidden="true"></i><input id="mobile" name="t_phone" type="text" maxlength="10" required=""></li>
                  <li class="text">Address : </li>
                  <li class="agileits-main"><i class="fa fa-home" aria-hidden="true"></i><input id="address" name="t_address" type="text" required=""></li>
                  <li class="text">District : </li>
                  <li class="agileits-main"><i class="fa fa-map-marker" aria-hidden="true"></i><input id="district" name="t_district" type="text" required=""></li>
                  <li class="text">Town : </li>
                  <li class="agileits-main"><i class="fa fa-map-marker" aria-hidden="true"></i><input id="town" name="t_town" type="text" required=""></li>
                  <li class="text">Password : </li>
                  <li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input id="pwd" name="t_pwd" type="password" required=""></li>
                  <li class="text">Confirm Password : </li>
                  <li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input id="pwd" name="confirm_pwd" type="password" required=""></li>
                </ul>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="agile-submit">
              <input style="border-radius: 8px; background-color:green; width:fit-content" name="teacher_submit" type="submit" value="submit">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button style="background-color: red; color:white; width:fit-content" type="button" class="btn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="studentAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div style="color: black; font-size: 1.1rem; font-weight: bold;" class="modal-header">
          You're Adding a Student:
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form id="add_student" class="mod2">
            <div class="row">
              <div class="col-md-6 col-xs-6 w3l-left-mk">
                <ul style="list-style-type: none;">
                  <li class="text">Name of student : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><input id="student_name" name="student_name" type="text" required=""></li>
                  <li class="text">Date of Birth : </li>
                  <li class="agileits-main"><i class="fa fa-calendar" aria-hidden="true"></i><input class="date" id="datepicker" name="student_dob" type="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" /></li>
                  <li class="text">Name of Parent : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><input id="student_parent" name="student_parent" type="text" required=""></li>
                  <li class="text">Gender : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><select id="gender" name="student_gender" type="text" required="">
                      <option selected disabled>--Select Gender</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select></li>
                  <li class="text">Grade : </li>
                  <li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><select id="grade" name="student_grade" type="text" required="">
                      <option selected disabled>--Select Grade</option>
                      <option>Grade 1</option>
                      <option>Grade 2</option>
                      <option>Grade 3</option>
                      <option>Grade 4</option>
                      <option>Grade 5</option>
                      <option>Grade 6</option>
                      <option>Grade 7</option>
                      <option>Grade 8</option>
                      <option>Grade 9</option>
                      <option>Grade 10</option>
                    </select></li>
                </ul>
              </div>
              <div class="col-md-6 col-xs-6 w3l-right-mk">
                <ul style="list-style-type: none;">
                  <li class="text">Home Mobile no : </li>
                  <li class="agileits-main"><i class="fa fa-phone" aria-hidden="true"></i><input id="mobile" name="student_phone" type="text" maxlength="10" required=""></li>
                  <li class="text">Address : </li>
                  <li class="agileits-main"><i class="fa fa-home" aria-hidden="true"></i><input id="address" name="student_address" type="text" required=""></li>
                  <li class="text">Town : </li>
                  <li class="agileits-main"><i class="fa fa-map-marker" aria-hidden="true"></i><input id="town" name="student_town" type="text" required=""></li>
                  <li class="text">Password : </li>
                  <li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input id="pwd" name="student_pwd" type="password" required=""></li>
                  <li class="text">Confirm Password : </li>
                  <li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input id="pwd" name="student_confirm_pwd" type="password" required=""></li>
                </ul>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="agile-submit">
              <input style="border-radius: 8px; background-color:green; width:fit-content" name="student_submit" type="submit" value="submit">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button style="background-color: red; color:white; width:fit-content" type="button" class="btn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("add_teacher").addEventListener("submit", function(event) {
      event.preventDefault();

      fetch('add_new_teacher.php', {
        method: 'POST',
        body: new FormData(document.getElementById("add_teacher"))
      }).then(res => res.json()).then(data => {
        if (data.added) {
          alert(data.added);
          document.getElementById("add_teacher").reset();
        } else if (data.mismatch) {
          alert(data.mismatch);
        } else if (data.check) {
          alert(data.check);
        } else if (data.present) {
          alert(data.present);
        }
      }).catch(error => {
        alert(error);
      });

    });

    document.getElementById("add_student").addEventListener("submit", function(event) {
      event.preventDefault();

      fetch('add_new_student.php', {
        method: 'POST',
        body: new FormData(document.getElementById("add_student"))
      }).then(res => res.json()).then(data => {
        if (data.added) {
          alert(data.added);
          document.getElementById("add_student").reset();
        } else if (data.mismatch) {
          alert(data.mismatch);
        } else if (data.check) {
          alert(data.check);
        } else if (data.present) {
          alert(data.present);
        }
      }).catch(error => {
        alert(error);
      });
    })
  </script>

</body>

</html>

</body>

</html>