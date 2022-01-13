<link rel="stylesheet" href="{{ asset('login/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>


<div class="container " style="margin-top: 200px">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="">
                <div class="form-data" v-if="!submitted">
                    <form action="{{ route('postLogin') }}" method="POST">
                        {{ csrf_field() }}
                        <div id="app">
                        <div class="forms-inputs mb-4"> <span>Email</span> 
                            <input autocomplete="off" class="w-100 @error ('email') form-control is-invalid @enderror" name="email" type="email" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
                            <div class="invalid-feedback">A valid email is required!</div>
                        </div>
                        <div class="forms-inputs mb-4"> <span>Password</span> 
                            <input autocomplete="off" class="w-100 @error ('password') form-control is-invalid @enderror" name="password" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
                            <div class="invalid-feedback">Password must be 8 character!</div>
                        </div>
                    </div>
                        <div class=""> 
                            <div class="mb-1" id="captcha">
                                {!! NoCaptcha::display() !!}
                                {!! NoCaptcha::renderJs() !!}
                                @error('g-recaptcha-response')
                                    <div class="text-danger">
                                         "Captcha required" 
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </div>
                    </form>
                    <p class="text-center my-3">Dont'have an account ? <a href="{{ route('signup') }}">Sign Up</a></p>
                </div>
                    
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('login/func.js') }}"></script>
