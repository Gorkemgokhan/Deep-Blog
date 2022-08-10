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
                <p>Bizimle İletişim Kurup Topluluk için önerlilerinizi ve fikirlerinizi paylaşabilirsiniz</p>
                <div class="my-5">

                    <form method="post" action="{{route("iletisimpost")}}">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required,name" />
                            <label for="name">İsim Soyisim</label>
                            <div class="invalid-feedback" value="{{old("name")}}" data-sb-feedback="name:required">A name is required.</div>
                            <p class="help-blodck text-danger"></p>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" name="email" value="{{old("email")}}" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                            <label for="email">Email adresi</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" name="konu" value="{{old("konu")}}" type="konu" placeholder="Konuyu seçiniz" data-sb-validations="required" />
                            <label >Konu</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="message" value="{{old("message")}}" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">Mesajınız</label>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form gönderimi başarılı!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Mesaj gönderilirken hata oluştu!</div></div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Gönder</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection


