document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-lead-form]').forEach((form) => {
    if (form.dataset.bound === 'true') return;
    form.dataset.bound = 'true';

    form.addEventListener('submit', (event) => {
      const status = form.querySelector('[data-lead-form-status]');
      const submitButton = form.querySelector('button[type="submit"]');
      const zip = form.querySelector('input[name="zip"]');

      if (zip && zip.value.trim() !== '' && !/^\d{5}$/.test(zip.value.trim())) {
        event.preventDefault();
        if (status) {
          status.textContent = 'ZIP code must be 5 digits if provided.';
        }
        return;
      }

      if (status) {
        status.textContent = 'Sending your request...';
      }

      if (submitButton) {
        submitButton.disabled = true;
      }
    });
  });
});
