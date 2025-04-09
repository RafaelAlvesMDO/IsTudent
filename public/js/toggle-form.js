function showForm(formType) {
    const inquilinoForm = document.getElementById('inquilino-form');
    const senhorioForm = document.getElementById('senhorio-form');
    const tabs = document.querySelectorAll('.tab');

    // Esconde os formulários
    inquilinoForm.classList.remove('active');
    senhorioForm.classList.remove('active');

    // Remove classe ativa dos botões
    tabs.forEach(tab => tab.classList.remove('active'));

    if (formType === 'inquilino') {
        inquilinoForm.classList.add('active');
        tabs[0].classList.add('active');
    } else {
        senhorioForm.classList.add('active');
        tabs[1].classList.add('active');
    }
}
