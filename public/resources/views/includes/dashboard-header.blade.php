<link href="{{ url('resources/assets/web') }}/css/dashboard-style/dashboardstyle.css" rel="stylesheet">
<link href="{{ url('resources/assets/web') }}/css/dashboard-style/intlTelInput.css" rel="stylesheet">
<link href="{{ url('resources/assets/web') }}/css/dashboard-style/style-lib.css" rel="stylesheet">
<section class="d-header">
    <div class="row m-0">
        <div class="col-lg-3 p-0">
            <div class="user-area" style="background-image: url('{{ url('resources/assets/web') }}/img/dashboard/user-img.jpg');">
                <div class="user-name">
                    <h3>{{ ucfirst($User->FirstName).' '.ucfirst($User->LastName) }}
                        <span></span></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-9 p-0">
            <div class="d-bg-main " style="background-image: url('{{ url('resources/assets/web') }}/img/dashboard/user-cover-img.jpg');">
                <div class="das-text">
                    <h3><span>{{ ucfirst($User->FirstName).' '.ucfirst($User->LastName) }},</span>
                        Welcome to your dashboard
                    </h3>
                </div>
            </div>
        </div>

    </div> 
</section>