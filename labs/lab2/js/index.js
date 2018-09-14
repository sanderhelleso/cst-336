window.onload = jackpot;

function jackpot() {
    
        const points = document.querySelector('#totalPoints');
        const attempts = document.querySelector('#totalAttempts');
        
        if (localStorage.getItem('points') === null) {
            localStorage.setItem('points', 0);
        }
        
        if (localStorage.getItem('attempts') === null) {
            localStorage.setItem('attempts', 0);
        }
        
        localStorage.setItem('points', parseInt(localStorage.getItem('points')) + parseInt(points.innerHTML));
        localStorage.setItem('attempts', parseInt(localStorage.getItem('attempts')) + parseInt(attempts.innerHTML));
        
        points.innerHTML = localStorage.getItem('points');
        attempts.innerHTML = localStorage.getItem('attempts');
}
