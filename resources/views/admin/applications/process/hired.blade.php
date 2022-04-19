<!-- STEP6 -->
<fieldset>
    <div class="form-card">
        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">Finish:</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 6 - 6</h2>
            </div>
        </div>

        <h1 class="goal_h1">Application Process end</h1>

        <section class="section_container">
        <div class="goal_card">
            <div class="bg-image">
            <img src="{{ asset('admin/images/faces/bg.png') }}" alt="">
            </div>
            <div class="pic">
            <img src="{{ asset('admin/images/faces/face8.jpg') }}" alt="">
            </div>
            <div class="info">
            <h3>{{ $hired->user->firstname }} {{ $hired->user->middlename }} {{ $hired->user->lastname }}</h3>
            <span><i class="job fas fa-briefcase"></i> {{ $hired->job->name }}</span>
            <p>hired on: {{ $hired->updated_at->format('M d, Y') }}</p>
            <!-- <div class="icons">
                <a href="#" class="fab fa-facebook-f"></a>
            </div> -->
            </div>
        </div>
        </section>
                                                    

    </div>

</fieldset>
<!-- ENDSTEP6 -->