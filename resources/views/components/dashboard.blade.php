@props(['alumniProfile'])
<div class="dashboard-cont">
    <div class="singel-dashboard pt-20">
        <h5>Full Name</h5>
        <p>{{$alumniProfile->surname.', '.$alumniProfile->other_names}}</p>
    </div> <!-- singel dashboard -->
    <div class="singel-dashboard pt-20">
        <div class="row">
            <div class="col-lg-6">
                <h5>Descipline</h5>
                <p>{{$alumniProfile->department}}</p>
            </div>
            <div class="col-lg-6">
                <h5>Graduation Month & Year</h5>
                <p>{{$alumniProfile->graduation_month.', '.$alumniProfile->graduation_year}}</p>
            </div>
        </div>
    </div> <!-- singel dashboard -->
    <div class="singel-dashboard pt-20">
        <div class="row">
            <div class="col-lg-6">
                <h5>Employer</h5>
                <p>{{$alumniProfile->employer}}</p>
            </div>
            <div class="col-lg-6">
                <h5>Position</h5>
                <p>{{$alumniProfile->position}}</p>
            </div>
        </div>
    </div> <!-- singel dashboard -->
    <div class="singel-dashboard pt-20">
        <h5>Address</h5>
        <p>{{$alumniProfile->address}}</p>
    </div> <!-- singel dashboard -->
    <div class="singel-dashboard pt-20">
        <div class="row">
            <div class="col-lg-6">
                <h5>Telephone</h5>
                <p>{{$alumniProfile->phone}}</p>
            </div>
            <div class="col-lg-6">
                <h5>Email</h5>
                <p>{{$alumniProfile->user->email}}</p>
            </div>
        </div>
    </div> <!-- singel dashboard -->
    <div class="singel-dashboard pt-20">
        <h5>Brief Profile</h5>
        <p style="font-style: italic;">{{$alumniProfile->brief_profile}}</p>
    </div> <!-- singel dashboard -->
</div> <!-- dashboard cont -->