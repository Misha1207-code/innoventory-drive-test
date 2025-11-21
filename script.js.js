// Basic JS for sending form data and handling responses
document.addEventListener('submit', function(e){
    if(e.target.matches('#loginForm')){
        e.preventDefault();
        fetch('php/login-action.php', {method:'POST', body:new FormData(e.target)})
        .then(r=>r.text()).then(t=>{
            if(t.trim() === 'admin') window.location.href = 'approval.php';
            else if(t.trim() === 'user') window.location.href = 'index.php';
            else if(t.trim() === 'pending') window.location.href = 'pending.php';
            else if(t.trim() === 'denied') window.location.href = 'denied.php';
            else window.location.href = 'login-error.php';
        });
    }
    if(e.target.matches('#signupForm')){
        e.preventDefault();
        fetch('php/signup-action.php', {method:'POST', body:new FormData(e.target)})
        .then(r=>r.text()).then(t=>{
            if(t.trim() === 'success') alert('Signed up! Wait for admin approval.');
            else if(t.trim() === 'exists') alert('Account already exists.');
            else alert('Error: ' + t);
            window.location.href = 'login.php';
        });
    }
});
