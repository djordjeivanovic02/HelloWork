function previewCV(id, cv) {
    const containerBg = document.querySelector('.cv-preview-background');
    const container = document.getElementById('pdfContainer');

    var pdfUrl = 'storage/uploads/user_' + id + '/cv/' + cv;
    var pdfjsLib = window['pdfjs-dist/build/pdf'];

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

    pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
        return pdf.getPage(1);
    }).then(function (page) {
        var scale = 1.5;
        var viewport = page.getViewport({ scale: scale });

        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        canvas.style.height = '100%';
        canvas.style.width = '100%';
        canvas.style.display = 'block';

        containerBg.classList.add('active')
        container.appendChild(canvas);

        document.body.style.overflow = 'hidden';

        function resizeCanvas() {
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
            renderPage();
        }

        function renderPage() {
            context.clearRect(0, 0, canvas.width, canvas.height);

            viewport = page.getViewport({ scale: 1 });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            page.render(renderContext);
        }

        resizeCanvas();

        window.addEventListener('resize', resizeCanvas);
    });
    container.addEventListener('click', function (event) {
        event.stopPropagation();
    })
    containerBg.addEventListener('click', function () {
        this.classList.remove('active');
        document.body.style.overflow = 'auto';
    });
}




function downloadCV(id, cv) {
    var url = '../storage/uploads/user_' + id + '/cv/' + cv;
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.blob();
        })
        .then(blob => {
            const url = URL.createObjectURL(blob);

            const link = document.createElement('a');
            link.href = url;
            link.download = 'cv.pdf';
            link.click();

            URL.revokeObjectURL(url);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
}
