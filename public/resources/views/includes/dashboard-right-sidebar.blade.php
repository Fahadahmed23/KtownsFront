<div class="col-lg-3 p-0">
    <div class="right-sidebar" style="background-image: url('{{ url('resources/assets/web') }}/img/dashboard/right-sidebar-bg.jpg');">
        <div class="side-add">
            <p class="fc-white mbpx-5">If you have any question please don‘t 
                hesitate to contact us</p>
            <a href="tel:{{ $configuration->Contact1 }}" class="tel fc-white d-block mbpx-5"><span class="phoneNumber">{{ $configuration->Contact1 }}</span></a>
            <a href="mailto:{{ $emails->SupportEmail }}" class="tel fc-white d-block mbpx-5"><span class="email">{{ $emails->SupportEmail }}</span></a>
        </div>
    </div>
</div>