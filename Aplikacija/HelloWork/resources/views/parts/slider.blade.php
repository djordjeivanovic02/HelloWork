<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
<div class="w-100">
    <div class="sliders_control">
       <input id="fromSlider" type="range" value="0" min="0" max="100"/>
       <input id="toSlider" type="range" value="100" min="0" max="100"/>
    </div>
    <div class="form_control w-100">
      <div class="form_control_container w-100 d-flex justify-content-center">
        <div class="d-none">
            <div class="form_control_container__time">Min</div>
            <input class="form_control_container__time__input" type="number" id="fromInput" value="10" min="0" max="100"/>
            <div class="form_control_container__time">Max</div>
            <input class="form_control_container__time__input" type="number" id="toInput" value="30" min="0" max="100"/>

        </div>

        <div class="price-preview">
            <p class="m-0">€<span id="fromPrice">0</span> €<span id="toPrice">10000</span></p>
        </div>
    </div>
</div>
<script src="{{ asset('js/slider.js') }}"></script>