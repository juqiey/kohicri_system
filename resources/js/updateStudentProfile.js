function updateStudentProfile(studentid, form) {
    // Get the values from the input fields
    var studentname = form.studentname.value;
    var studentbirth = form.studentbirth.value;
    var studentgender = form.studentgender.value;
    var studentnum = form.studentnum.value;
    var studentemail = form.studentemail.value;

    var studentaddress = form.studentaddress.value;
    var studentposkod = form.studentposkod.value;
    var studentcity = form.studentcity.value;

    var parentsname = form.parentsname.value;
    var parentsnum = form.parentsnum.value;

    var newPassword = form.newPassword.value;
    var confirmPassword = form.confirmPassword.value;
    
    // Validate the new password and confirm password fields
    if (newPassword !== confirmPassword) {
        alert('The new password and confirm password do not match.');
        return;
    }
  
    // Send a request to the server to update the student information
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controller/update_student_profile.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Handle successful update
        alert('Student information updated successfully.');
        window.location.href = 'student_profile.php';
      } else {
        // Handle error
        alert('Error updating student information.');
      }
    };
    xhr.send('studentid=' + studentid + '&studentname=' + studentname + 'studentbirth=' + studentbirth + '&studentgender=' 
    + studentgender + 'studentnum=' + studentnum + '&studentemail=' + studentemail + '&studentaddress=' + studentaddress + 
    '&studentposkod=' + studentposkod + 'studentcity=' + studentcity + '&parentsname=' + parentsname + '&parentsnum=' + parentsnum
    + '&newPassword=' + newPassword + '&confirmPassword=' + confirmPassword); 
  }