@extends('user.user')
@section('user')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('user/img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            @if ($errors->any())
              <div style=" padding: 20px;
    margin: 0 10%;
              background-color: #f44336;
              color: white;
              opacity: 1;
              transition: opacity 0.6s;
              border-radius:7px;
              margin-bottom: 15px;">
              <span class="closebtn" style=" margin-left: 15px;
              color: white;
              font-weight: bold;
              float: right;
              font-size: 22px;
              line-height: 20px;
              cursor: pointer;
              transition: 0.3s;">&times;</span>
                <strong>ooops!</strong> form is incorrectly completed.
                <script>
                    var close = document.getElementsByClassName("closebtn");
                    var i;

                    for (i = 0; i < close.length; i++) {
                        close[i].onclick = function(){
                            var div = this.parentElement;
                            div.style.opacity = "0";
                            setTimeout(function(){ div.style.display = "none"; }, 600);
                        }
                    }
                </script>
              </div>
            @endif
            <h1>Contact Me</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <form class="needs-validation" novalidate method="post" action="{{route('contactUS')}}">
          {{csrf_field()}}
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom01">First name</label>
              <input type="text" class="form-control" maxlength="20" value="{{old('firstName')}}" name="firstName" id="validationCustom01"  required>
              @error('firstName')
              <div class="text-danger">{{ '!!!'. $message }}</div>
              @enderror
              <div class="valid-feedback"> valeur correct</div>
              <div class="invalid-feedback">valeur incorrect</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationCustom02">Last name</label>
              <input type="text" class="form-control" maxlength="20" value="{{old('lastName')}}" name="lastName" id="validationCustom02"  required>
              @error('lastName')
              <div class="text-danger">{{ '!!!'. $message }}</div>
              @enderror
              <div class="valid-feedback"> valeur correct</div>
              <div class="invalid-feedback">valeur incorrect</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-8 mb-3">
              <label for="validationCustom03">@email</label>
              <input type="email" name="email" class="form-control" value="{{old('email')}}" id="validationCustom03" required>
              @error('email')
              <div class="text-danger">{{ '!!!'. $message }}</div>
              @enderror
              <div class="valid-feedback"> valeur correct</div>
              <div class="invalid-feedback">valeur incorrect</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="validationCustom05">message</label>
              <textarea class="form-control" id="validationCustom05" required name="message"  value="{{old('message')}}"rows="5" cols="30">
                </textarea>
              @error('message')
              <div class="text-danger">{{ '!!!'. $message }}</div>
              @enderror

            </div>
          </div>
          <button class="btn btn-danger" type="submit">Send to Admin</button>
        </form>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
      </div>
    </div>
  </div>

  <hr>
@endsection