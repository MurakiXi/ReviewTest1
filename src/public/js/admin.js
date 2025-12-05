document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('detail-modal');
    const overlay = modal ? modal.querySelector('.admin-modal__overlay') : null;
    const closeBtn = modal ? modal.querySelector('.admin-modal__close') : null;
    const deleteForm = document.getElementById('delete-form');

    const nameEl = document.getElementById('modal-name');
    const genderEl = document.getElementById('modal-gender');
    const emailEl = document.getElementById('modal-email');
    const telEl = document.getElementById('modal-tel');
    const addressEl = document.getElementById('modal-address');
    const buildingEl = document.getElementById('modal-building');
    const categoryEl = document.getElementById('modal-category');
    const contentEl = document.getElementById('modal-content');

    const detailButtons = document.querySelectorAll('.result-table__detail');


    if (!modal || !overlay || !closeBtn || !nameEl || detailButtons.length === 0) {
        console.warn('Modal init aborted', {
            modal: !!modal,
            overlay: !!overlay,
            closeBtn: !!closeBtn,
            nameEl: !!nameEl,
            detailButtonsLen: detailButtons.length,
        });
        return;
    }

    detailButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            console.log('dataset.tel =', btn.dataset.tel);

            nameEl.textContent = btn.dataset.name || '';
            genderEl.textContent = btn.dataset.gender || '';
            emailEl.textContent = btn.dataset.email || '';
            telEl.textContent = btn.dataset.tel || '';
            addressEl.textContent = btn.dataset.address || '';
            buildingEl.textContent = btn.dataset.building || '';
            categoryEl.textContent = btn.dataset.category || '';
            contentEl.textContent = btn.dataset.content || '';

            if (deleteForm && btn.dataset.deleteUrl) {
                deleteForm.action = btn.dataset.deleteUrl;
            }

            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        });
    });

    const closeModal = () => {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    overlay.addEventListener('click', closeModal);
    closeBtn.addEventListener('click', closeModal);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('is-open')) {
            closeModal();
        }
    });
});
