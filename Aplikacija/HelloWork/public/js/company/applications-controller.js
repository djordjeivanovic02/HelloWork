const applicationsSelect = document.getElementById('applicationsSelect');
const applicationGroups = document.querySelectorAll('.application-group');

applicationsSelect.addEventListener('change', function () {
    const selectedValue = applicationsSelect.value;

    applicationGroups.forEach(group => {
        if (selectedValue === 'all' && group.id === 'all-applications') {
            group.style.display = 'block';
        } else if (group.id === `applications-${selectedValue}`) {
            group.style.display = 'block';
        } else {
            group.style.display = 'none';
        }
    });
});
