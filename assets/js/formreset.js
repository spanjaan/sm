document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('subscribeForm');

    if (!form) {
        console.warn('Form not found.');
        return;
    }

    form.addEventListener('ajaxDone', () => {
        try {
            
            form.reset();

        } catch (error) {
            console.error('Error handling form submission:', error);
        }
    });
});
