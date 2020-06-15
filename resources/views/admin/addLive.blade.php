@extends('admin.index')
@section('content')
     {{--error case--}}
     @if ($errors->any())
         <div style=" padding: 20px;
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
             <strong>ooops!</strong> formulaire est mal rempli.{{$errors}}
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
    {{--form of adding --}}
    <form  class="needs-validation" name="frm" action="{{route('saveLive')}}" method="post" novalidate  ENCTYPE="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
            <legend ALIGN="center">
                <strong>Ajouter un LIVE </strong>
            </legend>
            <!--------------------------------------------------------------------->
            <br>
            <div class="form-row">
                <div class="col-md-2 ">
                    <strong>Title OF Live</strong>
                </div>
                <div class="col">
                    <input type="text" class="form-control "
                           maxlength="50" value="{{old('title')}}" name="title" placeholder="enter the title of live..." required>
                    <SCRIPT LANGUAGE="JavaScript">
                        document.forms.frm.title.focus();
                    </SCRIPT>
                    <div class="valid-feedback"> valeur correct</div>
                    <div class="invalid-feedback">valeur incorrect</div>
                    @error('title')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-2 ">
                    <strong>Link OF Live</strong>
                </div>
                <div class="col">
                    <input type="text" class="form-control "
                           maxlength="50" value="{{old('link')}}" name="link"  placeholder="enter the link of live..." required>
                    <div class="valid-feedback"> valeur correct</div>
                    <div class="invalid-feedback">valeur incorrect</div>
                    @error('link')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-2 ">
                    <strong>Date OF Live</strong>
                </div>
                <div class="col">
                    <input type="date" name="annee" value="{{old('annee')}}"  class="form-control"  required>
                    <div class="valid-feedback"> valeur correct</div>
                    <div class="invalid-feedback">valeur incorrect</div>
                    @error('date')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-2 ">
                    <strong>live with DR :</strong>
                </div>
                <div class="col">
                    <input type="text" class="form-control "
                           maxlength="50" value="{{old('name')}}" name="name"  placeholder="enter the name of profe..." required>
                    <div class="valid-feedback"> valeur correct</div>
                    <div class="invalid-feedback">valeur incorrect</div>
                    @error('name')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-2 ">
                    <strong>image for the cart :</strong>
                </div>
                <div class="col">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="img" placeholder="image for the cart" required>
                        <label class="custom-file-label" for="validatedCustomFile"></label>
                        <div class="valid-feedback"> valeur correct</div>
                        <div class="invalid-feedback">valeur incorrect</div>
                    </div>
                    @error('img')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>

            <!------------------------------------------------------------------- -->
            <br>
            <div id="bt" >
                <button class="btn btn-success w-25 mr-4" type="submit">Ajouter</button>
                <a href="{{route('home')}}"  class="btn btn-danger  " >annuler</a>
            </div>
            <!------------------------------------------------------------------- -->
        </fieldset>
    </form>
    <!-- SCRIPT TAGS----------------------------------------------------------------- -->
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

@endsection