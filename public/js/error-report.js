document.addEventListener('keydown', function(event) {
    if (event.ctrlKey && event.key === 'Enter') {
        const selectedText = window.getSelection().toString().trim();

        if (selectedText) {
            if (confirm('Отправить сообщение об ошибке?')) {
                sendErrorReport(selectedText);
            }
        }
    }
});

function sendErrorReport(selectedText) {
    const formData = new FormData();
    formData.append('text_error', selectedText);

    fetch('/error-report', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('Произошла ошибка при отправке сообщения об ошибке:', error);
        });
}
