@extends("front.layouts.master")
<title>İletişim</title>
@section("content")
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if(session("success"))
                <div class="alert alert-success">
                    {{session("success")}}
                </div>
                @endif
                <p style="text-align: center">Topluluk için önerlilerinizi ve fikirlerinizi paylaşabilirsiniz</p>
                <div class="my-5">

                    <form method="post" action="{{route("iletisim.post")}}">
                        @csrf
                        <div class="control-group">
                            <div class="form-group  controls">
                                <input type="text" class="form-control" value="{{old('name')}}" placeholder="Ad Soyad" name="name" required >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group  controls">
                                <input type="email" class="form-control" value="{{old('email')}}" placeholder="Email Adresiniz" name="email" required >
                            </div>
                        </div>
                        <div class="control-group">
                            <br>
                            <div class="form-group col-xs-12  controls">
                                <select class="form-control" name="konu">
                                    <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                                    <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                                    <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group  controls">
                                <br>
                                <textarea rows="5" name="message" class="form-control" placeholder="Mesajınız">{{old('message')}}</textarea>
                            </div>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form gönderimi başarılı!</div>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Mesaj gönderilirken hata oluştu!</div></div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Gönder</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection


