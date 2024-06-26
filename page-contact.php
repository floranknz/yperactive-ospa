<?php
/*
Template Name: Contact
*/

get_header();
?>

<div class="hero flex flex-col gap-48 items-center justify-center h-[400px] bg-mineral-green-400 text-pure-white px-24 pt-96">
    <div class="md:container flex flex-row justify-center">
        <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
            <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown">Contactez-nous</h1>
        </div>
    </div>
</div>

<div class="background-container bg-soft-white-200 pt-48 pb-48 my-80">
    <div class="container contact-section flex justify-between pretitle-1">
        <div class="contact-item flex flex-col items-center text-center w-3/12 gap-16">
            <div class="icon w-64 h-64 bg-outer-space-100 flex items-center justify-center rounded-full">
                <i class="bx bx-md bxs-map"></i>
            </div>
            <span>28 Avenue de Pythagore, 33700 Mérignac</span>
        </div>
        <div class="contact-item flex flex-col items-center text-center w-3/12 gap-16">
            <div class="icon w-64 h-64 bg-outer-space-100 flex items-center justify-center rounded-full">
                <i class="bx bx-md bxs-phone"></i>
            </div>
            <span>05 00 00 00 00</span>
        </div>
        <div class="contact-item flex flex-col items-center text-center w-3/12 gap-16">
            <div class="icon w-64 h-64 bg-outer-space-100 flex items-center justify-center rounded-full">
                <i class="bx bx-md bx-calendar"></i>
            </div>
            <span>Du lundi au vendredi, 8h - 18h</br>Le samedi 9h-18h</span>
        </div>
    </div>
</div>

<div class="container flex gap-24">
    <div class="w-1/4">
    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=28%20Avenue%20de%20Pythagore,%2033700%20M%C3%A9rignac+(O'Spa)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe></div>
    </div>
    <div class="w-3/4">
        <?= do_shortcode('[contact-form-7 id="057a783" title="Contact"]') ?>
    </div>
</div>

<?php get_footer(); ?>