document.addEventListener('click', function(e){
    const del = e.target.closest('.link-delete');
    if (del) {
        e.preventDefault();
        const url = del.getAttribute('data-delete');
        if (confirm('¿Confirmar eliminación?')) location.href = url;
    }
});

// Simple validations (progressivo)
document.addEventListener('submit', function(e){
    const form = e.target;
    if (form.id === 'registerForm'){
        const p = form.querySelector('input[name=password]').value;
        if (p.length < 6){ alert('La contraseña debe tener al menos 6 caracteres.'); e.preventDefault(); }
    }
});
