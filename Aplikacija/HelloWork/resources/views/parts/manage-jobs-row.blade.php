<tr>
    <td><input type="checkbox" name="first" id="first"></td>
    <td>
        <div class="w-100">
            <b class="m-0">
                <a href="">{{ $title }}</a>
            </b>
            <div class="row-images w-100">
                <div>
                    <svg class="d-inline-block" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_37_514)">
                        <path d="M16.875 8.5C16.875 4.70313 13.7969 1.625 10 1.625C6.20313 1.625 3.125 4.70313 3.125 8.5C3.125 13.5 10 20.375 10 20.375C10 20.375 16.875 13.5 16.875 8.5Z" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                        <path d="M10 11C11.3807 11 12.5 9.88071 12.5 8.5C12.5 7.11929 11.3807 6 10 6C8.61929 6 7.5 7.11929 7.5 8.5C7.5 9.88071 8.61929 11 10 11Z" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_37_514">
                        <rect width="20" height="21" fill="transparent"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <p class="row-info m-0 d-inline-block">{{ $city }}, {{ $country }}</p>
                    
                    <svg class="d-inline-block" width="18" height="19" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px">
                        <path d="M12.0714 0H0.928571C0.682299 0 0.446113 0.0790165 0.271972 0.219667C0.0978315 0.360317 2.01065e-09 0.55108 2.01065e-09 0.74999V14.2498C-1.16771e-05 14.3932 0.0508567 14.5335 0.146579 14.6543C0.242301 14.775 0.378866 14.8711 0.540094 14.9311C0.701323 14.991 0.88046 15.0124 1.05628 14.9927C1.23211 14.973 1.39725 14.913 1.53214 14.8198L6.5 11.4523L11.4121 14.7823C11.4989 14.8518 11.6018 14.9068 11.7149 14.9441C11.8281 14.9814 11.9492 15.0004 12.0714 14.9998C12.1932 15.0023 12.3141 14.9818 12.4243 14.9398C12.5939 14.8835 12.739 14.788 12.8415 14.6652C12.9439 14.5424 12.9991 14.3979 13 14.2498V0.74999C13 0.55108 12.9022 0.360317 12.728 0.219667C12.5539 0.0790165 12.3177 0 12.0714 0ZM11.1429 12.6448L7.09429 9.89986C6.92743 9.78761 6.71715 9.72615 6.5 9.72615C6.28285 9.72615 6.07257 9.78761 5.90571 9.89986L1.85714 12.6448V1.49998H11.1429V12.6448Z" fill="black"/>
                    </svg>                        
                    <p class="row-info m-0 d-inline-block">{{ $workTime }}</p>
                </div>
            </div>
        </div>
    </td>
    <td class="aplications-column">
        <p class="applications-text m-0">({{ $applications }}) Apliciranja</p>
    </td>
    <td class="status-column">
        @if ($status == 'Aktivan')
            <p class="ad-state active m-0">{{ $status }}</p>
        @endif
        @if ($status == "Istekao")
            <p class="ad-state deactive m-0">{{ $status }}</p>
        @endif
        @if ($status == "Čeka na proveru")
            <p class="ad-state pending m-0">{{ $status }}</p>
        @endif
    </td>
    <td>
        <div class="d-inline-block">
            <div class="action-btns look-btn d-flex justify-content-center align-items-center">
                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 9.00462C14.2091 9.00462 16 10.7955 16 13.0046C16 15.2138 14.2091 17.0046 12 17.0046C9.79086 17.0046 8 15.2138 8 13.0046C8 10.7955 9.79086 9.00462 12 9.00462ZM12 10.5046C10.6193 10.5046 9.5 11.6239 9.5 13.0046C9.5 14.3853 10.6193 15.5046 12 15.5046C13.3807 15.5046 14.5 14.3853 14.5 13.0046C14.5 11.6239 13.3807 10.5046 12 10.5046ZM12 5.5C16.6135 5.5 20.5961 8.65001 21.7011 13.0644C21.8017 13.4662 21.5575 13.8735 21.1557 13.9741C20.7539 14.0746 20.3466 13.8305 20.246 13.4286C19.3071 9.67796 15.9214 7 12 7C8.07693 7 4.69009 9.68026 3.75285 13.4332C3.65249 13.835 3.24535 14.0794 2.84348 13.9791C2.44161 13.8787 2.19719 13.4716 2.29755 13.0697C3.40064 8.65272 7.38448 5.5 12 5.5Z" fill="white"/></svg>
            </div>
        </div>
        <div class="d-inline-block">
            <div class="action-btns delete-btn d-flex justify-content-center align-items-center">
                <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M432 80h-82.38l-34-56.75C306.1 8.827 291.4 0 274.6 0H173.4C156.6 0 141 8.827 132.4 23.25L98.38 80H16C7.125 80 0 87.13 0 96v16C0 120.9 7.125 128 16 128H32v320c0 35.35 28.65 64 64 64h256c35.35 0 64-28.65 64-64V128h16C440.9 128 448 120.9 448 112V96C448 87.13 440.9 80 432 80zM171.9 50.88C172.9 49.13 174.9 48 177 48h94c2.125 0 4.125 1.125 5.125 2.875L293.6 80H154.4L171.9 50.88zM352 464H96c-8.837 0-16-7.163-16-16V128h288v320C368 456.8 360.8 464 352 464zM224 416c8.844 0 16-7.156 16-16V192c0-8.844-7.156-16-16-16S208 183.2 208 192v208C208 408.8 215.2 416 224 416zM144 416C152.8 416 160 408.8 160 400V192c0-8.844-7.156-16-16-16S128 183.2 128 192v208C128 408.8 135.2 416 144 416zM304 416c8.844 0 16-7.156 16-16V192c0-8.844-7.156-16-16-16S288 183.2 288 192v208C288 408.8 295.2 416 304 416z" fill="white"/></svg>
            </div>
        </div>
    </td>
</tr>