<div @if ($application->status == 'accepted') class="application-container submitted w-100 p-4" @endif
    @if ($application->status == 'rejected') class="application-container rejected w-100 p-4" @endif
    @if ($application->status == 'pending') class="application-container w-100 p-4" @endif>
    <p class="application-name m-0"><a href="/user/{{ $application->user_id }}">{{ $application->user->name }}</a></p>
    <a href="" class="my-1 application-category">{{ $application->user->userInfo->professional_title }}</a>
    <a href="/job/{{ $application->ad_id }}"
        class="my-1 d-inline-block application-job">({{ $application->ad->title }})</a>
    <div class="row-images w-100 my-2 mb-3">
        <div>
            <svg class="d-inline-block" width="20" height="21" viewBox="0 0 20 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_37_514)">
                    <path
                        d="M16.875 8.5C16.875 4.70313 13.7969 1.625 10 1.625C6.20313 1.625 3.125 4.70313 3.125 8.5C3.125 13.5 10 20.375 10 20.375C10 20.375 16.875 13.5 16.875 8.5Z"
                        stroke="#7F93B6" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round" />
                    <path
                        d="M10 11C11.3807 11 12.5 9.88071 12.5 8.5C12.5 7.11929 11.3807 6 10 6C8.61929 6 7.5 7.11929 7.5 8.5C7.5 9.88071 8.61929 11 10 11Z"
                        stroke="#7F93B6" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round" />
                </g>
                <defs>
                    <clipPath id="clip0_37_514">
                        <rect width="20" height="21" fill="transparent" />
                    </clipPath>
                </defs>
            </svg>
            <p class="row-info m-0 d-inline-block" style="color: #7F93B6">
                {{ $application->user->userInfo->city }}, {{ $application->user->userInfo->country }}</p>

            <svg viewBox="0 0 24 14.92" xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px">
                <title />
                <g data-name="Camada 2" id="Camada_2">
                    <g data-name="Camada 1" id="Camada_1-2">
                        <path
                            d="M23.5,4H22V2.5a.5.5,0,0,0-.5-.5H20V.5a.5.5,0,0,0-.5-.5H.5A.5.5,0,0,0,0,.5v9.91a.5.5,0,0,0,.5.5H2v1.5a.5.5,0,0,0,.5.5H4v1.5a.5.5,0,0,0,.5.5h19a.5.5,0,0,0,.5-.5V4.5A.5.5,0,0,0,23.5,4ZM15.8,9.91H4.2A3.74,3.74,0,0,0,1,6.71V4.2A3.74,3.74,0,0,0,4.2,1H15.8A3.74,3.74,0,0,0,19,4.2V6.71A3.74,3.74,0,0,0,15.8,9.91ZM19,7.71V9.91H16.79A2.76,2.76,0,0,1,19,7.71ZM19,1V3.21A2.76,2.76,0,0,1,16.79,1ZM1,1H3.21A2.76,2.76,0,0,1,1,3.21ZM1,7.71A2.76,2.76,0,0,1,3.21,9.91H1Zm2,3.21H19.5a.5.5,0,0,0,.5-.5V3h1v8.91H3Zm20,3H5v-1H21.5a.5.5,0,0,0,.5-.5V5h1Z"
                            fill="#7F93B6" />
                        <path
                            d="M10,2.06a3.39,3.39,0,1,0,3.39,3.39A3.4,3.4,0,0,0,10,2.06Zm0,5.78a2.39,2.39,0,1,1,2.39-2.39A2.39,2.39,0,0,1,10,7.85Z"
                            fill="#7F93B6" />
                    </g>
                </g>
            </svg>
            <p class="row-info m-0 d-inline-block" style="color: #7F93B6">
                {{ $application->user->userInfo->expected_salary }}€</p>
        </div>
    </div>
    @php
        $skills = explode('&', $application->user->userInfo->skills);
    @endphp
    @foreach ($skills as $item)
        @php
            $item = implode(' ', array_map('ucfirst', explode(' ', $item)));
        @endphp
        <div class="application-skill d-inline-block ml-2">
            <p class="m-0">{{ $item }}</p>
        </div>
    @endforeach

    <div class="actions w-100 d-flex justify-content-end align-items-center">
        <div
            @if ($application->status == 'accepted' || $application->status == 'rejected') style="display: none"
            @else
                style="display: flex" @endif>
            <div class="action-button submit d-flex align-items-center justify-content-center"
                onclick="showDialog('apply-user-{{ $application->ad_id . '-' . $application->user_id }}')">
                <img src="{{ asset('images/submitted.svg') }}" alt="Prihvati">
                <p>Prihvati</p>
            </div>
            <div class="action-button reject d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/rejected.svg') }}" alt="Prihvati">
                <p>Odbij</p>
            </div>
        </div>
        <div
            @if ($application->status == 'accepted' || $application->status == 'rejected') style="display: flex"
        @else
            style="display: none" @endif>
            <div class="action-button  d-flex align-items-center justify-content-center"
                onclick="showDialog('reject-user')">
                <p class="m-0">Otkaži</p>
            </div>
        </div>
    </div>

    @if ($application->status != 'accepted' && $application->status != 'rejected')
        <div class="download-container position-absolute d-flex justify-content-center align-items-center"
            onclick="downloadCV({{ $application->user->id }}, '{{ $application->user->userInfo->cv }}')">
            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"
                    fill="white" />
            </svg>
        </div>
    @endif
</div>


@component('dialogs.box-with-input', [
    'id' => 'apply-user-' . $application->ad_id . '-' . $application->user_id,
    'type' => 'success',
    'title' => 'Prihvati korisnika',
    'message' =>
        'Ukoliko želite da prihvatite apliciranje korisnika za posao ' .
        $application->ad->title .
        ', možete to uraditi klikom na dugme Prihvati',
    'close' => true,
    'actions' => [
        [
            'url' =>
                'javascript:acceptApplication(' .
                $application->ad_id .
                ', ' .
                $application->user_id .
                ", 'apply-user')",
            'type' => 'yes',
            'label' => 'Prihvati',
        ],
        [
            'url' => "javascript:closeDialog('apply-user-' . $application->ad_id . '-' . $application->user_id .')",
            'type' => 'cancel',
            'label' => 'Otkaži',
        ],
    ],
])
@endcomponent

@component('dialogs.box-with-input', [
    'id' => 'reject-user',
    'type' => 'success',
    'title' => 'Odbij korisnika',
    'message' =>
        'Ukoliko želite da odbijete apliciranje korisnika za posao ' .
        $application->ad->title .
        ', možete to uraditi klikom na dugme Odbij',
    'close' => true,
    'actions' => [
        [
            'url' =>
                'javascript:acceptApplication(' .
                $application->ad_id .
                ', ' .
                $application->user_id .
                ", 'apply-user')",
            'type' => 'yes',
            'label' => 'Odbij',
        ],
        [
            'url' => "javascript:closeDialog('reject-user')",
            'type' => 'cancel',
            'label' => 'Otkaži',
        ],
    ],
])
@endcomponent


<script src="{{ asset('js/user/cv-actions.js') }}"></script>
<script src="{{ asset('js/user/apply-for-job.js') }}"></script>
