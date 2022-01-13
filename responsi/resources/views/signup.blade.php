{{-- <link rel="stylesheet" href="{{ asset('login/style.css') }}"> --}}
<style>
    body {
    /* background: #000 */
    background-image: url("{{ asset('login') }}/bg_blur.png");
    background-size: 100%;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>


<div class="container " style="margin-top: 200px">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="app">
                <div class="form-data" v-if="!submitted">
                    <form action="{{ route('signMeUp') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="forms-inputs mb-4"> <span>Name</span> <br>
                            <input autocomplete="off" name="name" type="text" style="width: 100%; height: 38px">
                        </div>
                        <div class="forms-inputs mb-4"> <span>Email</span> 
                            <input autocomplete="off" name="email" type="text" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
                            <div class="invalid-feedback">A valid email is required!</div>
                        </div>
                        <div class="forms-inputs mb-4"> <span>Password</span> 
                            <input autocomplete="off" name="password" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
                            <div class="invalid-feedback">Password must be 8 character!</div>
                        </div>
                        <div class="mb-3"> 
                            {{-- <button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Login</button> --}} 
                            <button type="submit" class="btn btn-dark w-100">Sign Up</button>
                        </div>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('login/func.js') }}"></script>
