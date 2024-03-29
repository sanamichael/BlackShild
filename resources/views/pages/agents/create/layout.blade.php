@extends('layouts.app')

@section('head')
  <style type="text/css">
/* Style the form */
/*#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}
*/
/* Style the input fields */
/*input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}*/

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
/*.tab {
  display: none;
}*/

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #868282;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #00ce08;
}

.select2-selection__rendered li.select2-selection__choice{
  color: white;
  background: #3C8DBC;
}

.select2-container--default .select2-selection--single{
  border-radius: 0;
  height: 20px;
}
</style>


@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ajouter un nouvel agent
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li><a href="#">Gere les agents</a></li>
        <li class="active">Ajouter un nouvel agent</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- /.box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="text-center">FICHE AGENT</h3>
          
                <!-- START ACCORDION & CAROUSEL-->

          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                </div>
                  <div id="#pageContent">
                    

{{--                 <!-- form start -->
                <form id="regForm" role="form" action="{{route('agent.store')}}" method="post">
                @csrf
                  /.box-header
                  <div class="box-body">
                    <div class="box-group" id="accordion">
                      <!-- One "tab" for each step in the form: --> --}}
                      
                      @yield('tab')

                      <!-- Circles which indicates the steps of the form: -->
{{--                       <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                      </div>
                    <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.box-body -->
                </form> --}}
                  </div>
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- /.row -->
        </div>
      </div>
    </section>



    <!-- /.content -->
  {{-- </div> --}}
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- jQuery 3 -->
<!-- Select2 -->
<script src="{{asset('')}}bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('')}}bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="{{asset('')}}plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('')}}plugins/iCheck/icheck.min.js"></script>


<script type="text/javascript">
  //Affichae des champ des informations administrative
  var nationalite=$("select[name='nationalite'] :selected")

  $("select[name='nationalite']").change(function(){
    var SelectedValue = $("option:selected", this).val();
    displayElement(SelectedValue)
  })

  displayElement("{{ old('nationalite') ?: 'FR' }}")

  function displayElement(SelectedValue='FR'){
    if(SelectedValue=='FR'){
      //Show
      $("#div_carteidentite").show(500)
      $("#div_numerocarteidentite").show(500)
      //Hide
      $("#div_numeroetranger").hide(500)
      $("#div_lieudelivrancecs").hide(500)
      $("#div_etablissementcartedesejour").hide(500)
      $("#div_cartedesejour").hide(500)
      $("#div_expirationcartedesejour").hide(500)
    }else{
      //Show
      $("#div_numeroetranger").show(500)
      $("#div_lieudelivrancecs").show(500)
      $("#div_etablissementcartedesejour").show(500)
      $("#div_cartedesejour").show(500)
      $("#div_expirationcartedesejour").show(500)
      //Hide
      $("#div_carteidentite").hide(500)
      $("#div_numerocarteidentite").hide(500)
    }
  }

</script>

<script type="text/javascript">
  //Affichage des champ de la qualification
  var ads=$("input[name='ads']")
  var maitrechien=$("input[name='maitrechien']")

  ads.change(function(){
    if ($(this).is(':checked')) {
        $("#div_numeroads").show(500)
    } else {
        $("#div_numeroads").hide(500)
    }
  })

  maitrechien.change(function(){
    if ($(this).is(':checked')) {
      $("#div_nomchien").show(500)
      $("#div_datevaliditevaccin").show(500)
    } else {
      $("#div_nomchien").hide(500)
      $("#div_datevaliditevaccin").hide(500)
    }
  })

</script>

<script type="text/javascript">
  //Affichae des champ des informations administrative
  var nationalite=$("select[name='typecontrat'] :selected")
  var div_dureeducontrat=$("#div_dureeducontrat")

  $("select[name='typecontrat']").change(function(){
    var SelectedValue = $("option:selected", this).val();
    displayDureeElement(SelectedValue)
  })

  displayDureeElement("{{ old('typecontrat') ?: 'cdi' }}")

  function displayDureeElement(SelectedValue='cdi'){
    if(SelectedValue==='cdi' || SelectedValue===''){
      //Hide
      div_dureeducontrat.hide(500)
    }else{
      //Show
      div_dureeducontrat.show(500)
    }
  }
</script>




















{{-- <script type="text/javascript">
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Ajouter";
    } else {
      document.getElementById("nextBtn").innerHTML = "Suivant";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    // if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
      //...the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  // function validateForm() {
  //   // This function deals with validation of the form fields
  //   var x, y, i, valid = true;
  //   x = document.getElementsByClassName("tab");
  //   y = x[currentTab].getElementsByTagName("input");
  //   // A loop that checks every input field in the current tab:
  //   for (i = 0; i < y.length; i++) {
  //     // If a field is empty...
  //     if (y[i].value == "") {
  //       // add an "invalid" class to the field:
  //       y[i].className += " invalid";
  //       // and set the current valid status to false:
  //       valid = false;
  //     }
  //   }
  //   // If the valid status is true, mark the step as finished and valid:
  //   if (valid) {
  //     document.getElementsByClassName("step")[currentTab].className += " finish";
  //   }
  //   return valid; // return the valid status
  // }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
  }
</script> --}}




<script type="text/javascript">
  $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
                $('#img-upload').css('height','200px');

            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });
</script>
@endsection