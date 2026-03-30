document.addEventListener('DOMContentLoaded', () => {
  window.dataLayer = window.dataLayer || [];

  document.querySelectorAll('[data-conversion-page-success]').forEach((element) => {
    window.dataLayer.push({
      event: 'landing_form_submit',
      page_slug: element.getAttribute('data-conversion-page-success') || '',
    });
  });

  document.querySelectorAll('[data-conversion-event]').forEach((element) => {
    if (element.dataset.boundConversion === 'true') return;
    element.dataset.boundConversion = 'true';

    element.addEventListener('click', () => {
      window.dataLayer.push({
        event: element.getAttribute('data-conversion-event'),
        page_slug: element.getAttribute('data-conversion-page') || '',
        href: element.getAttribute('href') || '',
      });
    });
  });
});
