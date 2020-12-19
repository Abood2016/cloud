@extends('layouts.app')

@section('style')
<style type="text/css">
.desabled {
	pointer-events: none;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-4">
    		<div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>Add User</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="addUser" class="" method="POST" action="">
                            <label for="first_name" class="col-md-12 col-form-label">First Name</label>

                            <div class="col-md-12">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="" required autofocus>
                            </div>
                            <label for="last_name" class="col-md-12 col-form-label">Last Name</label>

                            <div class="col-md-12">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="" required autofocus>
                            </div>
                            <label for="std_id" class="col-md-12 col-form-label">Student Id</label>

                            <div class="col-md-12">
                                <input id="std_id" type="text" class="form-control" name="std_id" value="" required autofocus>
                            </div>
                            <label for="email" class="col-md-12 col-form-label">Email</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                            </div>
                            <label for="phone" class="col-md-12 col-form-label">Phone number</label>

                            <div class="col-md-12">
                                <input id="phone" type="phone" class="form-control" name="phone" value="" required autofocus>
                            </div>
                            <label for="dob" class="col-md-12 col-form-label">Date of Birth</label>

                            <div class="col-md-12">
                                <input id="dob" type="date" class="form-control" name="dob" value="" required autofocus>
                            </div>
                            <label for="level" class="col-md-12 col-form-label">Level</label>

                            <div class="col-md-12">
                                <select class="custom-select" id="level">
                                    <option selected>Choose option</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                  </select>
                            </div><br>
                                <div class="col-md-12 col-md-offset-3">
                                    <button type="button" class="btn btn-primary btn-block desabled" id="submitUser">Submit</button>

                                </div>

                    </form>
                </div>
            </div>
    	</div>
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>All Users Listing</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Date of Birth</th>
                            <th>Level</th>
                        </tr>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>You Want You Sure Delete This Record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteMatchRecord">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect update-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success waves-effect waves-light updateUserRecord">Update</button>
                </div>
            </div>
        </div>
    </div>
</form> --}}


@endsection


@section('script')
<script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-firestore.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>


// Initialize Firebase

var firebaseConfig = {
   apiKey: "AIzaSyC6anjgGkdu1ZmOQ3iqubw53ITRF05hdUM",
   authDomain: "projectcloud-243cc.firebaseapp.com",
   databaseURL: "https://projectcloud-243cc.firebaseio.com",
   projectId: "projectcloud-243cc",
   storageBucket: "projectcloud-243cc.appspot.com",
   messagingSenderId: "342012000826",
   appId: "1:342012000826:web:53ddd3195cd75847d19303",
   measurementId: "G-72HXE052RN"
};
firebase.initializeApp(firebaseConfig);
  var database = firebase.firestore();
//  var size = 0;
database.collection('Student').get().then(snap => {
 //  size = snap.size // will return the collection size
   var htmls = [];
   snap.docs.forEach(doc=>{
    id = doc.id;
    doc = doc.data();
    htmls.push('<tr>\
         		<td>'+ doc.std_id +'</td>\
         		<td>'+ doc.first_name +'</td>\
         		<td>'+ doc.last_name +'</td>\
         		<td>'+ doc.email +'</td>\
         		<td>'+ doc.phone_nubmer +'</td>\
         		<td>'+ doc.dob +'</td>\
         		<td>'+ doc.level +'</td>\
        	</tr>');
            /*<td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+id+'">Update</a>\
         		<a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+id+'">Delete</a></td>\*/
    $('#tbody').html(htmls);

   });

});


// Add Data
$(document).on('click', '#submitUser', function(){
    //console.log("test");

  //  var lastIndex = size;
	var values = $("#addUser").serializeArray();

	var first_name = values[0].value;
	var last_name = values[1].value;
	var std_id = values[2].value;
	var email = values[3].value;
	var phone_nubmer = values[4].value;
	var dob = values[5].value;
	var level = $('#level').val();
//	var userID = lastIndex+1;
 //   const docRef = database.collection('iug').doc('student');
 database.collection('Student').doc(std_id).set({
        first_name: first_name,
        last_name: last_name,
        std_id: std_id,
        email: email,
        phone_nubmer: phone_nubmer,
        dob: dob,
        level: level,
     }).then(function () {
        console.log('database updated');
     }).catch(function (err) {
         console.log(err)
     });

    // Reassign lastID value
    lastIndex = userID;
	$("#addUser input").val("");
});


</script>

@endsection
