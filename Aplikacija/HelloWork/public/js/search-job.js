$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
const fullTimeEl = document.querySelector('#fullTime');
const partTimeEl = document.querySelector('#partTime');
const dailyPayEl = document.querySelector('#dailyPay');
const mountlyPayEl = document.querySelector('#mountlyPay');
const yearlyPayEl = document.querySelector('#yearlyPay');
document.addEventListener('DOMContentLoaded', function () {
    $('#sortSelect').on('change', function () {
        $('#sorting').val($(this).val());
        $('#filterForm').submit();
    });
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();

        let url = $(this).attr('href');
        fetchJobs(url);
    });

    async function fetchJobs(url) {
        await $.ajax({
            url: url,
            method: 'GET',
            success: function (data) {
                document.querySelector('.job-list-container').innerHTML = data;
            },
            error: function () {
                console.error("Došlo je do greške prilikom učitavanja oglasa.");
            }
        });
    }

    function restoreFilters() {
        let params = new URLSearchParams(window.location.search);
        let filters = {
            search: params.get('search') || '',
            location: params.get('location') || '',
            categorie: params.get('jobCategory') || '',
            fulltime: params.get('fullTime') || '',
            parttime: params.get('partTime') || '',
            dailypay: params.get('dailyPay') || '',
            mountlypay: params.get('mountlyPay') || '',
            yearlypay: params.get('yearlyPay') || '',
            minsalary: params.get('minPrice') || '',
            maxsalary: params.get('maxPrice') || '',
            sorting: params.get('sorting') || '0',
            skills: params.get('skills') || '',
        };
        if (filters) {
            $('#search').val(filters.search);
            $('#location').val(filters.location);
            $('#jobCategory').val(filters.categorie);
            $('#sortSelect').val(filters.sorting);
            $('#skills').val(filters.skills);

            if (filters.fulltime == 'on') {
                fullTimeEl.checked = true;
                fullTimeEl.parentElement.classList.add('active');
                fullTimeEl.parentElement.querySelector('.select-toggler').classList.add('active');
            }
            if (filters.parttime == 'on') {
                partTimeEl.checked = true;
                partTimeEl.parentElement.classList.add('active');
                partTimeEl.parentElement.querySelector('.select-toggler').classList.add('active');
            }
            if (filters.dailypay == 'on') {
                dailyPayEl.checked = true;
                dailyPayEl.parentElement.classList.add('active');
                dailyPayEl.parentElement.querySelector('.select-toggler').classList.add('active');
            }
            if (filters.mountlypay == 'on') {
                mountlyPayEl.checked = true;
                mountlyPayEl.parentElement.classList.add('active');
                mountlyPayEl.parentElement.querySelector('.select-toggler').classList.add('active');
            }
            if (filters.yearlypay == 'on') {
                yearlyPayEl.checked = true;
                yearlyPayEl.parentElement.classList.add('active');
                yearlyPayEl.parentElement.querySelector('.select-toggler').classList.add('active');
            }
            if (filters.minsalary != '') {
                $('#fromSlider').val(filters.minsalary);
                $('#fromPrice').html(filters.minsalary * 1000);
            }
            if (filters.maxsalary != '') {
                $('#toSlider').val(filters.maxsalary);
                $('#toPrice').html(filters.maxsalary * 1000);
            }

            if (filters.minsalary != '' && filters.maxsalary != '') {
                const fromSlider = document.querySelector('#fromSlider');
                const toSlider = document.querySelector('#toSlider');

                fillSlider(fromSlider, toSlider, '#C6C6C6', '#613FE5', toSlider);
            }
        }
    }

    restoreFilters();

});

function resetFilters() {
    const fromSlider = document.querySelector('#fromSlider');
    const fromPrice = document.querySelector('#fromPrice');
    const toSlider = document.querySelector('#toSlider');
    const toPrice = document.querySelector('#toPrice');
    $('#search').val('');
    $('#location').val('');
    $('#jobCategory').val('');
    $('#sortSelect').val('0');
    $('#skills').val('');

    fullTimeEl.checked = false;
    partTimeEl.checked = false;
    dailyPayEl.checked = false;
    mountlyPayEl.checked = false;
    yearlyPayEl.checked = false;
    fromSlider.value = fromSlider.min;
    toSlider.value = toSlider.max;
    fromPrice.innerHTML = fromSlider.min;
    toPrice.innerHTML = toSlider.max;

    let baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    history.replaceState(null, '', baseUrl);
    window.location.href = '/searchjob';
}
